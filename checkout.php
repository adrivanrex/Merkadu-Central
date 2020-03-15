<?php
include_once('class.manageUsers.php');
$users = new ManageUsers();
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\Amount;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;



require 'start.php';


if(!isset($_GET['amount'],$_GET['username'],$_GET['password'])){
	die();
}
$username = $_GET["username"];
$product = "sugal";
$userAmount = $_GET['amount'];
$amount = $_GET["amount"];
$price = $amount;
$GetUserInfo = $users->GetUserInfo($username);

$currency = $GetUserInfo[0]["countryCurrency"];

$shipping = 0.00;

$total = $price + $shipping;

$payer = new Payer();
$payer->setPaymentMethod('paypal');

$item = new Item();
$item->setName($product);
$item->setCurrency($currency)
	->setQuantity(1)
	->setPrice($price);

$itemList = new ItemList();
$itemList->setItems([$item]);

$details = new Details();
$details->setShipping($shipping)
	->setSubtotal($amount);

$amount = new Amount();
$amount->setCurrency($currency)
		->setTotal($total)
		->setDetails($details);


$transaction = new Transaction();
$transaction->setAmount($amount)
	->setDescription('Pay for something')
	->setInvoiceNumber(uniqid());

$url = "pay.php?success=true&amount=".$userAmount."&username=".$username."";
$siteRedirectUrl = $url;

$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl(SITE_URL. $siteRedirectUrl)
	->setCancelUrl(SITE_URL. 'pay.php?success=false');

$payment = new Payment();
$payment->SetIntent('sale')
	->setPayer($payer)
	->setRedirectUrls($redirectUrls)
	->setTransactions([$transaction]);
try {
	$payment->create($paypal);

}catch(Exception $e){
	die($e);
}

$approvalUrl = $payment->getApprovalLink();
header("Location: {$approvalUrl}");

echo $approvalUrl;
?>