<?php
class Warranty extends AppModel {
	var $name = 'Warranty';
	
	var $belongsTo = array(
		'Dealer' => array(
			'className' => 'User', // use the user model
			'foreignKey' => 'dealer_id' // the key in the reports table to use
		),
		'Customer' => array(
			'className' => 'User', // use the user model
			'foreignKey' => 'customer_id' // the key in the reports table to use
		),
        'ApprovedBy' => array(
            'className' => 'User',
            'foreignKey' => 'approved_by'
        )
	);
	
	var $hasMany = array(
        'WarrantyProduct' => array(
            'dependent'=> true
        )
    );

    var $actsAs = array('Containable');
    
	public $validate = array(
		'installation_date' => array(
			'rule' => 'notEmpty',
			'on' => 'create',
			'message' => 'Please provide an installation date'
		),
		'installation_type' => array(
			'rule' => 'notEmpty',
			'on' => 'create',
			'message' => 'Please provide an installation type'
		)
	);
	
}
?>