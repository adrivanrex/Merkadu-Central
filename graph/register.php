<?php
include_once('../class/class.manageUsers.php');
$datetime = date_create()->format('Y-m-d H:i:s');

$users = new ManageUsers();

header('Access-Control-Allow-Origin: *');

$username = $_GET["username"];
$password = $_GET["password"];
$firstName = $_GET["firstName"];
$middleName = $_GET['middleName'];
$lastName = $_GET['lastName'];
$mobileNumber = $_GET['mobileNumber'];
$email = $_GET['email'];
$sponsor = $_GET['sponsor'];
$upline = $_GET['upline'];
$placement = $_GET['placement'];
$registrationCode = $_GET['registrationCode'];
$paypal = "none";
$dateTime = date("H:i:s");
$country = $_GET["country"];
$continent = $_GET["continent"];
$currency = $_GET["currency"];
$state = $_GET["state"];
$city = $_GET["city"];
$streetAddress = $_GET["streetAddress"];
$secondAddress = $_GET["secondAddress"];
$postalCode = $_GET["postalCode"];
$referalCompany = $_GET["referalCompany"];
$registrationCode = $_GET["registrationCode"];
$bdayYear = $_GET["bdayYear"];
$bdayMonth = $_GET["bdayMonth"];
$bdayDay = $_GET["bdayDay"];
$gender = $_GET["gender"];


if (is_numeric($bdayYear)) { } else { 
	exit(); } 
if (is_numeric($bdayMonth)) { } else { 
	exit(); } 
if (is_numeric($bdayDay)) { } else { 
	exit(); } 



header('Content-Type: application/json');

$directReferalAmount = 500;


$checkUser = $users->CheckUserExist($username);
$checkUpline = $users->CheckUserExist($upline);
$checkRegistrationCode = $users->checkRegistrationCode($registrationCode);

//var_dump($checkUpline);
if($checkUser == 0){
		//var_dump($checkUpline);
	if($placement == "left" || $placement == "right"){	
		



		if($checkUpline === 1){
		
			$filterUpline = $users->filterUpline($upline,$username,$placement);
			//var_dump($filterUpline);
			if($filterUpline){
			$data = (object) array('registration' => 0,'message' => "Placement is already occupied");
			echo json_encode($data);
			}else{

				if($checkRegistrationCode == 1){
					$datetime = date_create()->format('Y-m-d H:i:s');
					$reg_time = $datetime;

					$registration = $users->registerUsers($username,$password,$firstName,$middleName,$lastName,$mobileNumber,$email,$sponsor,$upline,$placement,$registrationCode,$country,$continent,$currency,$streetAddress,$secondAddress,$state,$postalCode,$city,$bdayYear,$bdayMonth,$bdayDay,$gender);

					//var_dump($registration);
					if($registration == 2){
						$data = (object) array('registration' => 2,'message' => "Duplicate Name");
						echo json_encode($data);
					}

					if($registration == 1)
					{
					/** update registration code status **/
					$updateRegistrationCodeStatus = $users->registrationCodeUsedStatus($registrationCode);
					$data = (object) array('registration' => $registration,'message' => "success");
					/** Direct referal **/

					$directReferal = $users->directReferal($sponsor,$username);
					if($directReferal){
						$directReferalBalance = $users->updateBalance($sponsor,$directReferalAmount,$username);
					}
					/** add new users to downline **/


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

						if (($key = array_search($username, $uplines)) !== false) {
						    
						    	unset($uplines[$key]);
						    
						}

					//print_r($uplines);

					
					foreach($uplines as $key=>$value){
							
							if($value){
								$downlineStatus = $users->addToDownline($username,$placement,$value);	
							}
							
					};
					

					
					
					foreach ($uplines as $key => $value) {
						if($value){
							//var_dump($value);
							$award = $users->awardPairs($value);
							//var_dump($award);
							if($award === 1){
								$pairingAward = $users->addbalanceFromPairing($value,$award);
							}elseif ($award === 3) {
								$pairingAward = $users->addbalanceFromPairing($value,$award);
							}


						}
						
					}

					
					
					echo json_encode($data);

					};


				}else{
					$data = (object) array('registration' => 0,'message' => "Invalid Registration Code");
			echo json_encode($data);
				}
								}
		
		}else{	

			$data = (object) array('registration' => 0,'message' => "Invalid Upline username");
			echo json_encode($data);
			
		}
	}else{

		$data = (object) array('registration' => 0,'message' => "Invalid Placement");
			echo json_encode($data);

	}

	
	

}else{
	$data = (object) array('registration' => 0,'message' => "username already taken");
	echo json_encode($data);
}



?>