<?php
App::Import('Model', 'User');
class Customer extends User {
	var $name = 'Customer';
	var $useTable = 'users';
	var $customerGroupID = 4;
	
	// only return users where group_id = 4 (Customer)
	function beforeFind($queryData) {
		$queryData['conditions']['Customer.group_id'] = $customerGroupID;
		return $queryData;
 	}

	// Ensure the Group is set to Customer before saving this record
	function beforeSave() {
 		$this->data['Customer']['group_id'] = $customerGroupID;
		return true;
	}

	
}
?>