<?php
class WarrantiesController extends AppController {

	var $name = 'Warranties';

	var $paginate = array('limit' => 10, 'contain' => array('Dealer', 'Customer'));
        
	function beforeFilter() {
		parent::beforeFilter();

                $this->Auth->allow('download', 'pdf');

                if($this->currentUser != null) {
                    $this->Auth->allow('*');
                }

                if($this->currentUser['User']['group_id'] > 1) {
                    $this->Auth->deny('approve');
                }

	}
	
	function index() {
        $this->Warranty->recursive = 2;
        if(!empty($this->data)) {
            if($this->data['WarrantyProduct'][0]['product_id'] != null) {
                $this->paginate = array(
                    'fields' => 'DISTINCT Warranty.*',
                    'limit' => 10,
                    'joins' => array(array('table'=>'warranty_products', 'alias' => 'WarrantyProduct', 'conditions'=>'Warranty.id = WarrantyProduct.warranty_id'))
                );

                $this->set('warranties', $this->paginate('Warranty', array('WarrantyProduct.product_id' => $this->data['WarrantyProduct'][0]['product_id'])));
            } else {
                $conditions = array();
                foreach($this->data as $key => $value) {
                    if($key != 'WarrantyProduct') {
                        $newKey = $key . " LIKE";
                        $conditions[$newKey] = '%' . $value . '%';
                    }
                }
                $this->set('warranties', $this->paginate('Warranty', $conditions));
            }
        } else {
            $this->set('warranties', $this->paginate());
        }

        $this->set('products', $this->Warranty->WarrantyProduct->Product->find('list'));
	}

	function view($id = null) {
		$this->Warranty->recursive = 2;
		$isNull = $this->Warranty->read(null, $id);
		if (!$id || $isNull == NULL) {
			$this->Session->setFlash(__('Invalid Warranty', true));
			$this->redirect(array('action' => 'index'));
		}
		
		$this->set('warranty', $this->Warranty->read(null, $id));
	}

	function add($type = 'Residential') {
		if (!empty($this->data)) {
			$this->Warranty->create();
			for($x = 0; $x < count($this->data['WarrantyProduct']); $x++) {
            	if(isset($this->data['WarrantyProduct'][$x]['glass'])) {
					$this->data['WarrantyProduct'][$x]['glass'] = implode(',',$this->data['WarrantyProduct'][$x]['glass']);
                }
			}
			if ($this->Warranty->saveAll($this->data, array('validate' => 'first'))) {
				$this->redirect(array('action' => 'customer', $this->Warranty->id));
			} else {
				$this->Session->setFlash(__('The warranty could not be saved. Please try again.', true));
			}
		}
                
		$this->set('installation_type', $type);
		$this->set('products', $this->Warranty->WarrantyProduct->Product->find('list'));
	}
	
	function addProduct() {
		$this->set('products', $this->Warranty->WarrantyProduct->Product->find('list'));
		$this->set('counter', $this->params['url']['counter']);
		$this->layout = false;
	}
	
	function customer($id) {
		
		$this->Warranty->recursive = 3;

		if(!empty($this->data)) {
			$this->data['Customer']['group_id'] = 4;
			
			if($this->Warranty->Customer->saveAll($this->data)) {
				$this->Warranty->save(array('customer_id' => $this->Warranty->Customer->id));
				$this->redirect(array('action' => 'confirm', $this->Warranty->id));
			} else {
				$this->Session->setFlash(__('The warranty could not be saved. Please try again.', true));
			}
		} else {
			$this->data = $this->Warranty->findById($id);
			if(isset($this->data['Customer']['Profile'])) {
				$this->data['Profile'] = $this->data['Customer']['Profile'];
			}
		}
	}

	function confirm($id) {
		$this->Warranty->recursive = 4;
		$this->set('data', $this->Warranty->findById($id));
	}
	
	function process($id) {
		$this->Warranty->recursive = 2;
		$this->data = $this->Warranty->findById($id);

		if($this->data['Warranty']['processed'] == 1) {
			$this->Session->setFlash('This warranty has already been processed.', true);
		} else {
			$this->data['Warranty']['processed'] = 1;
			
			/* does Warranty require approval */
			$this->data['Warranty']['approved'] = 1;
			
			$this->Session->setFlash('This warranty has been approved. An email has been sent to the customer with a link download a PDF copy', true);
			
			foreach($this->data['WarrantyProduct'] as $wp) {
				if($wp['Product']['glass_approval'] > 0 && $wp['Product']['glass_approval'] < $wp['square_footage']) {
					$this->data['Warranty']['approved'] = 0;
					$this->Session->setFlash('This warranty requires approval from Madico. An email will be sent to the customer with a link to download a PDF copy upon approval', true);
				}
			}
			
			$this->Warranty->save($this->data);
		}
		
		$this->redirect(array('action' => 'view', $id));
	}
	
	function form($id) {
		$this->layout = false;
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid warranty', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Warranty->saveAll($this->data)) {
				$this->Session->setFlash(__('The warranty has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The warranty could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Warranty->read(null, $id);
		}
		$users = $this->Warranty->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for warranty', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Warranty->delete($id)) {
			$this->Session->setFlash(__('Warranty deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Warranty was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function pdf($id = null) {
		$this->Warranty->recursive = 2;
		$warranty = $this->Warranty->read(null, $id);
		if (!$id || $warranty == NULL) {
			$this->Session->setFlash(__('Invalid Warranty', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->layout = false;
		$this->set('warranty', $warranty);
	}

	function download($id = null) {
		require_once("../../dompdf/dompdf_config.inc.php");

		$warranty = $this->Warranty->read(null, $id);
		if(!$id || $warranty == NULL) {
			$this->Session->setFlash(__('Invalid Warranty', true));
			$this->redirect(array('action' => 'index'));
		}

		App::import('Helper', 'Html');
		$html = new HtmlHelper();

		$FileName = "MadicoWarranty-" . $id . ".pdf";

		$dompdf = new DOMPDF();
		$pdfHtml = file_get_contents($html->url(array('action' => 'pdf', $id), true));
		$dompdf->load_html($pdfHtml);
		$dompdf->set_paper('letter', 'portrait');
		$dompdf->render();
		
		$dompdf->stream($FileName);
		exit();
	}
	
	function approve($id = null) {
		$warranty = $this->Warranty->read(null, $id);
		if(!$id || $warranty == NULL) {
			$this->Session->setFlash(__('Invalid Warranty', true));
			$this->redirect(array('action' => 'index'));
		}

        $this->Warranty->recursive = 2;
        
		$this->Warranty->read(null, $id);
		$this->Warranty->set(array('approved' => '1', 'approved_by' => $this->currentUser['User']['id'], 'approved_date' => date(DATE_ATOM)));
		$this->Warranty->save();
		
		$CustomerEmail = $warranty['Customer']['email'];
		$DealerEmail = $warranty['Dealer']['email'];
		
        $this->_sendWarrantyEmail($warranty, $CustomerEmail, 'customer_approved', 'Approved');
        $this->_sendWarrantyEmail($warranty, $DealerEmail, 'dealer_approved', 'Approved');

		$this->redirect(array('action' => 'view', $id));
	}

    function deny($id = null) {
        $warranty = $this->Warranty->read(null, $id);
        if(!$id || $warranty == null) {
            $this->Session->setFlash('Invalid Warranty', true);
            $this->redirect(array('action' => 'index'));
        }

        $this->Warranty->recursive = 2;

        $this->Warranty->read(null, $id);
        $this->Warranty->set(array('approved' => '-1', 'approved_by' => $this->currentUser['User']['id'], 'approved_date' => date(DATE_ATOM)));
        $this->Warranty->save();
        
				$CustomerEmail = $warranty['Customer']['email'];
				$DealerEmail = $warranty['Dealer']['email'];
		
        $this->_sendWarrantyEmail($warranty, $CustomerEmail, 'customer_denied', 'Denied');
        $this->_sendWarrantyEmail($warranty, $DealerEmail, 'dealer_denied', 'Denied');

        $this->redirect(array('action' => 'view', $id));
    }

    function _sendWarrantyEmail($warranty, $to, $template, $status) {
		//$this->Email->delivery = 'debug';
        $this->Email->to = $to;
        $this->Email->from = 'Madico Warranty Department <warrantyInfo@madico.com>';
        $this->Email->subject = 'Madico Glass Protection Warranty '.$status;
        $this->Email->template = $template;
        $this->Email->sendAs = 'text';
        $this->set('warranty', $warranty);
        if ( $this->Email->send() ) { 
            $this->Session->setFlash('Glass Protection. '.$status); 
        } else { 
            $this->Session->setFlash('Warranty '.$status.' - Email Not Sent!'); 
        } 
		//pr($this->Session->read('Message.email'));
    }
}
?>