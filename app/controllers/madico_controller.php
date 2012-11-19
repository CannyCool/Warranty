<?php
class MadicoController extends AppController {
	var $name = 'Madico';

	var $uses = array();
        
	var $paginate = array('limit' => 10);

        function beforeFilter() {
            parent::beforeFilter();

            if($this->currentUser != null && $this->currentUser['User']['group_id'] < 3) {
                $this->Auth->allow('*');
            }
        }

	function index() {
            $this->loadModel('Warranty');
            $this->set('needApproval', $this->paginate('Warranty', array('Warranty.processed =' => '1', 'Warranty.approved =' => '0')));
            $this->set('products', ClassRegistry::init('Product')->find('list'));

            $this->set('dealers', ClassRegistry::init('User')->find('all', array('conditions' => array('User.group_id' => 3), 'order' => 'User.id DESC', 'limit' => '10')));
	}
}
?>