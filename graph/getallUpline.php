<?php
include_once('../class/class.manageUsers.php');
$datetime = date_create()->format('Y-m-d H:i:s');

$users = new ManageUsers();

session_start();
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials', 'Content-Type');
header('Content-Type: application/json');

$username = "thirdmatrixleftleft";
$placement = "right";


$uplines = array();
array_push($uplines,$username);

$key = true;
 while($key){
        $myLastElement = end($uplines);
        if($myLastElement === "none"){
        	$key = false;
        }else{
        	$uplinesToArray = $users->getallupline($myLastElement);
			array_push($uplines,$uplinesToArray);
        	
        }
        
    }
//var_dump($uplines);
if (($key = array_search('none', $uplines)) !== false) {
						    unset($uplines[$key]);
}




?>