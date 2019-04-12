<?php

namespace Dnetix\Redirection;

date_default_timezone_set('America/Bogota');

require '../vendor/autoload.php';

/*require __DIR__.'\..\vendor\Dnetix\redirection\src\placetopay.php';*/

spl_autoload_register(function ($nombre_clase) {
						    
						    include $nombre_clase . '.php';		    

						});



$login = '6dd490faf9cb87a9862245da41170ff2';
$secretKey = '024h1llD';	
$seed = date('c');
		
if (function_exists('random_bytes')) {
	$nonce = bin2hex(random_bytes(16));
} elseif (function_exists('openssl_random_pseudo_bytes')) {
    $nonce = bin2hex(openssl_random_pseudo_bytes(16));
} else {
    $nonce = mt_rand();
}
$nonceBase64 = base64_encode($nonce);
$tranKey = base64_encode(sha1($nonce . $seed . $secretKey, true));


// Creating a random reference for the test
$reference = 'TEST_' . time();

$placetopay = new PlacetoPay([
    'login' => $login,    
    'tranKey' => $tranKey,
    'url' => 'https://test.placetopay.com/redirection'
]);
	
		
$request = [
	"auth" => [
		 "login" => $login,
         "seed" => $seed,
         "nonce" => $nonce,
         "tranKey" => $tranKey
	],         
	'payment' => [
        'reference' => $reference,
        'description' => 'Testing payment',
        'amount' => [
            'currency' => 'USD',
            'total' => 120,
        ],
    ],
    'expiration' => date('c', strtotime('+2 days')),
    'returnUrl' => 'http://example.com/response?reference=' . $reference,
    'ipAddress' => '127.0.0.1',
    'userAgent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36'
];

$response = $placetopay->request($request);
if ($response->isSuccessful()) {
    // STORE THE $response->requestId() and $response->processUrl() on your DB associated with the payment order
    // Redirect the client to the processUrl or display it on the JS extension
    header("Status: 301 Moved Permanently");
    header('Location: ' . $response->processUrl());
    

    echo $response->status();
    echo  $response->processUrl();
} else {
    // There was some error so check the message and log it
   echo $response->status()->message();
    
}


/*
$request = [
		"locale" => "es_CO",
		 "payer" => [
        "name" => "Kellie Gerhold",
        "surname" => "Yost",
        "email" => "flowe@anderson.com",
        "documentType" => "CC",
        "document" => "1848839248",
        "mobile" => "3006108300",
        "address" => [
            "street" => "703 Dicki Island Apt. 609",
            "city" => "North Randallstad",
            "state" => "Antioquia",
            "postalCode" => "46292",
            "country" => "US",
            "phone" => "363-547-1441 x383"
        ]
    ],
    "buyer" => [
        "name" => "Kellie Gerhold",
        "surname" => "Yost",
        "email" => "flowe@anderson.com",
        "documentType" => "CC",
        "document" => "1848839248",
        "mobile" => "3006108300",
        "address" => [
            "street" => "703 Dicki Island Apt. 609",
            "city" => "North Randallstad",
            "state" => "Antioquia",
            "postalCode" => "46292",
            "country" => "US",
            "phone" => "363-547-1441 x383"
        ]
    ],
    "payment" => [
    	"reference" => $reference,
    	 "description" => "Iusto sit et voluptatem.",
    	 "amount" => [
            "taxes" => [
                [
                    "kind" => "ice",
                    "amount" => 56.4,
                    "base" => 470
                ],
                [
                    "kind" => "valueAddedTax",
                    "amount" => 89.3,
                    "base" => 470
                ]
            ],
             "details" => [
                [
                    "kind" => "shipping",
                    "amount" => 47
                ],
                [
                    "kind" => "tip",
                    "amount" => 47
                ],
                [
                    "kind" => "subtotal",
                    "amount" => 940
                ]
            ],
             "currency" => "USD",
            "total" => 1076.3
    ],
     "items" => [
            [
                "sku" => 26443,
                "name" => "Qui voluptatem excepturi.",
                "category" => "physical",
                "qty" => 1,
                "price" => 940,
                "tax" => 89.3
            ]
        ],
        "shipping" => [
            "name" => "Kellie Gerhold",
            "surname" => "Yost",
            "email" => "flowe@anderson.com",
            "documentType" => "CC",
            "document" => "1848839248",
            "mobile" => "3006108300",
            "address" => [
                "street" => "703 Dicki Island Apt. 609",
                "city" => "North Randallstad",
                "state" => "Antioquia",
                "postalCode" => "46292",
                "country" => "US",
                "phone" => "363-547-1441 x383"
            ]
        ],

         "allowPartial" => false
		],	
			 "expiration" => date('c', strtotime('+1 hour')),
		    "ipAddress" => "127.0.0.1",
		    "userAgent" => "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36",
		    "returnUrl" => "http://dnetix.dev/p2p/client",
		    "cancelUrl" => "https://dnetix.co",
		    "skipResult" => false,
		    "noBuyerFill" => false,
		    "captureAddress" => false,
		    "paymentMethod" => null
		];
*/



/*echo "Llega hasta aqui! " . $tranKey;*/




?>