<?php
App::Import('Controller', 'Users');
class CustomersController extends UsersController {
	var $name = 'Customers';
	
	function index() {
	}
}
?>