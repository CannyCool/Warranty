<?php
class WarrantyProduct extends AppModel {
	var $name = 'WarrantyProduct';
		
	var $belongsTo = array('Warranty', 'Product');
	
	public $validate = array(
		'product_id' => array(
			'rule' => 'notEmpty',
			'message' => 'Please provide a film for installation'
		),
		'square_footage' => array(
			'rule' => 'notEmpty',
			'message' => 'Please provide the square footage'
		),
	);
}
?>