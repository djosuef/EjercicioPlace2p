<?php

	class Address {

    var $street;
	var $city;
	var $state;
	var $postalCode;
	var $country;
	var $phone;	
		
		 public function __construct($street, $city, $state, $postalCode, $country, $phone) {

		      $this -> street = $street;
		      $this -> city = $city;
		      $this -> state = $state;
		      $this -> postalCode = $postalCode;
		      $this -> country = $country;
		      $this -> phone = $phone;     
		  }

	}
