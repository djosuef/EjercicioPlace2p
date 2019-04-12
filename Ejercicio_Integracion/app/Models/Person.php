<?php

class Person {

		var $documentType;
		var $document;
		var $name;
		var $surname;
		var $company;
		var $email;
		var $address;
		var $mobile;

		public function __construct($documentType, $document, $name, $surname, $company, $email, $address, $mobile){

			  $this -> documentType = $documentType;
			  $this -> document = $document;
			  $this -> name = $name;
			  $this -> surname = $surname;
			  $this -> company = $company;
			  $this -> email = $email;
			  $this -> address = $address;
			  $this -> mobile = $mobile;
		}
	}

?>



