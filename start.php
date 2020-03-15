<?php
require 'paypal/vendor/autoload.php';
define('SITE_URL','http://hantakserver/');



$client_ID = 'AdTYjoVE10ZTH-0qL2nXkocdlNCWYK5oaw241_rYXRr5eaFGDIhPjvkh8DUfmUWSby4cMeEUiKwZa9rb';
$client_Secret = 'ELQZXHKGOR3SkyjqYeLfW1pU7ikjkfjC3cjMRmECJkKOXE3Hs7cB2nT4X5ZBJATNUiRpJiLZE2MOYe-A';


/** SANDBOX 
$client_ID = 'AbRjWFsAuQTVmoHcDx_QdXIikNMVxvxBpLU3W762OLP1a_22gUdfgJ4WUcUdyq684_0ZJTr3X-a1gcAD';
$client_Secret = 'EIV9Fhq3px3HgQ2sN7oMnBeUWOF7n51vNx-GJjqBHjRjY9Brwq-dWzG8diyuYKmENF5BpDbAUTVnPEx3';
**/

$paypal = new \PayPal\Rest\ApiContext(
  new \PayPal\Auth\OAuthTokenCredential(
    $client_ID,
    $client_Secret
  )
);

$paypal->setConfig(
      array(
        'log.LogEnabled' => true,
        'log.FileName' => 'PayPal.log',
        'log.LogLevel' => 'DEBUG',
        'mode' => 'live'
      )
);

?>
