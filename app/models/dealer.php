<?php
App::Import('Model', 'User');
class Dealer extends User {
	var $name = 'Dealer';
	
	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'id'
		)
	);
	
	var $useTable = 'users';
	var $dealerGroupID = 3;
	  
	// only return users where group_id = 3 (Dealer)
	function beforeFind($queryData) {
		$queryData['conditions']['Dealer.group_id'] = $dealerGroupID;
		return $queryData;
 	}

	// Ensure the Group is set to Dealer before saving this record
	function beforeSave() {
 		$this->data['Dealer']['group_id'] = $dealerGroupID;
		return true;
	}
	
}
?>