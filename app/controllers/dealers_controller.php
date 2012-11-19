<?php
class DealersController extends AppController {
	var $name = 'Dealers';
	
	function index() {
		$this->loadModel('User');
		$id = $this->currentUser['User']['id'];
		$this->set('user', $this->User->read(null, $id));
	}
}
?>