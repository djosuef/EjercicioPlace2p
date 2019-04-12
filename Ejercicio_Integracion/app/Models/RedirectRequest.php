<?php

class RedirectRequest{
	var $locale;
	var $payer;
	var $buyer;
	var $subscription;
	var $fieldset;
	var $paymentMethod;
	var $expiration;
	var $returnUrl;
	var $cancelUrl;
	var $ipAddress;
	var $userAgent;
	var $skipResult;
	var $noBuyerFill;	

	 // El método constructor de la clase
   public function __construct(locale, payer, buyer, subscription, fieldset, paymentMethod, expiration
   							   returnUrl, cancelUrl, ipAddress, userAgent, skipResult, noBuyerFill) {

      $this -> locale = $locale;
      $this -> payer = $payer;
      $this -> buyer = $buyer;
      $this -> subscription = $subscription;
      $this -> fieldset = $fieldset;
      $this -> paymentMethod = $paymentMethod;
      $this -> expiration = $expiration;
      $this -> returnUrl = $returnUrl;
      $this -> cancelUrl = $cancelUrl;
      $this -> ipAddress = $ipAddress;
      $this -> userAgent = $userAgent;
      $this -> skipResult = $skipResult;
      $this -> noBuyerFill = $noBuyerFill;
   }

}


?>