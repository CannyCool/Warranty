<?php
class AppController extends Controller {

    var $components = array('Auth', 'Session', 'Email');
    var $helpers = array('Form', 'Html', 'Time', 'Session');

    function beforeFilter() {
        //Configure AuthComponent
        //$this->Auth->authorize = 'actions';
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
        $this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'loginRedirect');
        $this->Auth->actionPath = 'controllers/';

        $this->currentUser = $this->Auth->user();

        $this->isAuthed = !empty($this->currentUser);

    }

    function beforeRender() {
        $this->set('auth', $this->currentUser);
        $this->set('isAuthed', $this->isAuthed);
    }
}