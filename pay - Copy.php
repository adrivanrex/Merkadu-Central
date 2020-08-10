<?php
$server = "https://adrivanrex.github.io/HighOrLow/";
include_once('class.manageUsers.php');
$datetime = date_create()->format('Y-m-d H:i:s');

$users = new ManageUsers();


use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
require 'start.php';

if(!isset($_GET['success'], $_GET['paymentId'],$_GET['PayerID'])) {
   die();
 }

if ((bool)$_GET['success'] === false){
   die();
}

$username = $_GET["username"];

$paymentId = $_GET['paymentId'];
$payerId = $_GET['PayerID'];

$payment = Payment::get($paymentId, $paypal);
$execute = new PaymentExecution();
$execute->setPayerId($payerId);


try {
    $result = $payment -> execute($execute, $paypal);
} catch (Exception $e) {
    $data = json_decode($e->getData());
    var_dump($data);

}


session_start();
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials', 'Content-Type');
header('Content-Type: application/json');
$amount = $_GET['amount'];

$topupPaypal = $users->paypalTopup($username,$amount,$paymentId,$amount);

header("Location: https://adrivanrex.github.io/HighOrLow/play.html");

?>
