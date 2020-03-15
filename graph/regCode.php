<?php
include_once('../class/class.manageUsers.php');
$datetime = date_create()->format('Y-m-d H:i:s');

$users = new ManageUsers();

header('Access-Control-Allow-Origin: *');

$username = $_GET["username"];
$password = $_GET["password"];

header('Content-Type: application/json');



$login = $users->LoginUser($username,$password);
if($login == 1){
	$checkRole = $users->GetUserInfo($username);
if($checkRole[0]["role"] == "admin"){
	
	$generateCode = $users->generateRegistrationCode($username);
	$data = (object) array('data' => $generateCode);
	echo json_encode($data);
}
}

?>