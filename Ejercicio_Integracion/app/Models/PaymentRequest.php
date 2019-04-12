<?php

	class PaymentRequest {

    var $reference;
	var $description;
	var $amount;
	var $allowPartial;
	var $shipping;
	var $items;
	var $fields;
	var $recurring;
	var $subscribe;
		
		 public function __construct($reference, $description, $amount, $allowPartial, $shipping, $items, $fields, $recurring, $subscribe) {

      $this -> reference = $reference;
      $this -> description = $description;
      $this -> amount = $amount;
      $this -> allowPartial = $allowPartial;
      $this -> shipping = $shipping;
      $this -> items = $items;
      $this -> fields = $fields;
      $this -> recurring = $recurring;
      $this -> subscribe = $subscribe;
   }

	}



?>