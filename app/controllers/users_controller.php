<?php
class UsersController extends AppController {
	var $name = 'Users';
	
	var $uses = array('User', 'Warranty', 'Warranty_products'); 

	var $paginate = array('limit' => 10);

	function beforeFilter() {
            parent::beforeFilter();

            $this->Auth->fields = array(
                "username" => "email",
                "password" => "password"
            );

            $this->Auth->allow('login', 'registration');
            
            if($this->currentUser != null) {
                $this->Auth->allow('*');
            }

            if($this->currentUser['User']['group_id'] > 1) {
                $this->Auth->deny('add', 'delete');
            }
	}

	function dealers() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate('User', array('User.group_id = ' => '3')));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
            $this->User->data = $this->data;
			if ($this->User->saveAll()) {
				$this->Session->setFlash(__('The user has been saved', true));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

	function edit($id = null) {
		if($id == null || $this->currentUser['User']['group_id'] != 1) {
			$id = $this->currentUser['User']['id'];
		}

		if(!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data)) {				
			if($this->currentUser['User']['group_id'] == 3 && empty($this->data['User']['distributor'])) {
				$this->Session->setFlash(__('Please provide a distributor name.', true));
			}
			else if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'edit'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		$this->data = $this->User->read(null, $id);

		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for user', true));
			$this->redirect(array('action'=>'dealers'));
		}
		$data = array(
           'User' => array(
				'id' => $id,
				'disabled' => 1
           )
        );
		if ($this->User->save($data)) {
			$this->Session->setFlash(__('User disabled', true));
			$this->redirect(array('action'=>'dealers'));
		}
		/*
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action'=>'dealers'));
		}
		*/
		$this->Session->setFlash(__('User was not deleted', true));
		$this->redirect(array('action' => 'dealers'));
	}

	function login() {
		$this->data['User']['password'] = $this->Auth->data['User']['password'];
		if ($this->Auth->login($this->data))
			$this->redirect('loginRedirect');
		else {
			$this->Session->setFlash(__('Email/Password Incorrect', true));
			$this->redirect('/');
		}
	}
	
    function logout() {
		$this->Auth->logout();
		$this->Session->setFlash(__('Logout successful', true));
        $this->redirect('/');
    } 

    function loginRedirect() {
		// check if user is disabled
		if ($this->Auth->user('disabled') == 1) {
			$this->Auth->logout();
			$this->Session->setFlash(__('User disabled', true));
			$this->redirect('/');
		}
	
        if($this->Auth->user('group_id') == 3)
            $this->redirect("/dealers");
        else
            $this->redirect("/madico");
    }

	function table() {
	}
	
	function home() {
		$this->set('needApproval', $this->paginate('Warranty', array('Warranty.processed =' => '1', 'Warranty.approved =' => '0')));
		$this->set('products', $this->Warranty->WarrantyProduct->Product->find('list'));
	}
	
	function results($type = null, $value = null) {
		if ($type == 'contact') {
			$like = '%'.$value.'%';
			$this->set('searchContacts', $this->paginate('User', array('User.contact_name LIKE' => $like)));
		}
		if ($type == 'dealer') {
			$like = '%'.$value.'%';
			$this->set('searchDealers', $this->paginate('User', array('User.business_name LIKE' => $like)));
		}
		if ($type == 'date') {
			$this->set('searchDates', $this->paginate('Warranty', array('Warranty.installation_date =' => $value)));
		}
		if ($type == 'filmType') {
			$this->set('searchFilmTypes', $this->paginate('Warranty_products', array('Warranty_products.product_id =' => $value)));
		}
	}
	
	function registration() {
		if (!empty($this->data)) {
            //check email address
			$chkEmail = $this->User->find('count', array('conditions' => array('email' => $this->data['User']['email'])));

			$this->data['User']['psword'] = $this->Auth->password($this->data['User']['psword']);
            $this->data['User']['group_id'] = 3;
            if($this->data['User']['password'] != $this->data['User']['psword']) {
			 	$this->Session->setFlash(__('Passwords did not match.', true));
			}
			else if(empty($this->data['User']['distributor'])) {
				$this->Session->setFlash(__('Please provide a distributor name.', true));
			}
			else if($chkEmail != 0) {
				$this->Session->setFlash(__('Email is already being used.', true));
				$this->data['User']['password'] = "";
				$this->data['User']['psword'] = "";
			}
			else {			
				if ($this->User->save($this->data)) {
					$this->Auth->login($this->data);
					$this->redirect(array('action' => '../dealers/'));
				} else {
					$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
				}
			}
		}
	}
}
?>