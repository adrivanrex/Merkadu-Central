<?php
include_once('class.manageUsers.php');
$datetime = date_create()->format('Y-m-d H:i:s');

header('Access-Control-Allow-Origin: *');

$users = new ManageUsers();
$username = $_GET["username"];
$password = $_GET["password"];
$sentFrom = $_GET["sentFrom"];
$sendTo = $_GET["sendTo"];
$price = abs($_GET["price"]);

$transaction = $users->transact($username,$password,$sentFrom,$sendTo,$price);
var_dump($transaction);
?>