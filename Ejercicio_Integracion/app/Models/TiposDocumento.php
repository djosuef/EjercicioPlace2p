<?php

class TiposDocumento{

	var $pais;
	var $codigo;
	var $tipoDocumento;

	public function __construct($pais, $codigo, $tipoDocumento) {  

		$this -> pais = $pais;
		$this -> codigo = $codigo;
		$this -> tipoDocumento = $tipoDocumento;

   }

   get pais(){

   	return $this -> pais;

   }

   get codigo(){

   	return $this -> codigo;
   }

   get tipoDocumento(){

   	return $this -> tipoDocumento;
   }

}