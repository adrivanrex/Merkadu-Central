<?php
include_once('class.manageUsers.php');
$datetime = date_create()->format('Y-m-d H:i:s');

$users = new ManageUsers();
$username = $_GET["username"];
$amount = $_GET["amount"];

session_start();
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials', 'Content-Type');
header('Content-Type: application/json');

$topup = $users->topup($username,$amount);
$data = (object) array('update' => $topup);
echo json_encode($data);

?>