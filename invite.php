<?php
error_reporting(0);
include_once('class.manageUsers.php');
$datetime = date_create()->format('Y-m-d H:i:s');

$users = new ManageUsers();
$username = $_GET["username"];
$password = $_GET["password"];

$userInviter = $_GET["userInviter"];
$status = "active";
$inviteCode = $_GET["inviteCode"];
header('Content-Type: application/json');
$user = $username;

$checkLogin = $users->LoginUsers($username,$password);
if($checkLogin == 1){
	$checkInvitationExist = $users->checkInvitationCode($username,$password);


	switch ($checkInvitationExist) {
    case 0:
        $invite = $users->generateInviteCode($user,$password,$userInviter,$inviteCode,$status);
		echo json_encode($invite);
        break;
    case 1:
        $inviteCodeInfo = $users->showInviteCodeInfo($username,$password,$inviteCode);
		echo json_encode($inviteCodeInfo);
        break;
    case "green":
        echo "Your favorite color is green!";
        break;
    default:
        echo "Your favorite color is neither red, blue, nor green!";
}


	
}

?>
