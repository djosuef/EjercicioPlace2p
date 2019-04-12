<?php

class Item {

	var $sku;
	var $name;
	var $category;
	var $qty;
	var $price;
	var $tax;

	public function __construct($sku, $name, $category, $qty, $price, $tax){

		  $this -> sku = $sku;
		  $this -> name = $name;
		  $this -> category = $category;
		  $this -> qty = $qty;
		  $this -> price = $price;
		  $this -> tax = $tax;	
	}

}