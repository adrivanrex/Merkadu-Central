<?php
include_once('class.manageUsers.php');
$datetime = date_create()->format('Y-m-d H:i:s');

$users = new ManageUsers();
header('Access-Control-Allow-Origin: *');

session_start();
header('Content-Type: application/json');

if($_SESSION["username"]){
	$data = (object) array('online' => 1);
	echo json_encode($data);
}else{
	$data = (object) array('online' => 0);
	echo json_encode($data);
}


?>