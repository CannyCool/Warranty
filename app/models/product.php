<?php
class Product extends AppModel{
	var $name = 'Product';
	
	var $hasMany = array('WarrantyProduct');
}
?>