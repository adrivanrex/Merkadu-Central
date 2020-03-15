<?php
//error_reporting(0);
include_once('database.php');
$datetime = date_create()->format('Y-m-d H:i:s');

$pairingAward = 1500;

class ManageUsers{
    public $link;

    function __construct(){
        $db_connection = new dbConnection();
        $this->link = $db_connection->connect();
        return $this->link;
    }


    function registerUsers($username,$password,$firstName,$middleName,$lastName,$mobileNumber,$email,$sponsor,$upline,$placement,$registrationCode,$country,$continent,$currency,$streetAddress,$secondAddress,$state,$postalCode,$city,$bdayYear,$bdayMonth,$bdayDay,$gender){
        $datetime = date_create()->format('Y-m-d H:i:s');
        $role = "user";
        $accountLock = false;
        $lockedTime = $datetime;
        $unlockTime = $datetime;
        $reg_time = $datetime;


        $query = $this->link->query("SELECT * FROM userinfo WHERE firstName='$firstName'");
        $firstNameResult = $query->fetchAll(); 
        $firstNameCounts = $query->rowCount();
        if($firstNameCounts){
            $firstNameA = $firstNameResult[0]["firstName"];
        }else{
            $firstNameA = null;
        }
        

        

        $query = $this->link->query("SELECT * FROM userinfo WHERE middleName='$middleName'");
        $middleNameResult = $query->fetchAll();
        $middleNameCounts = $query->rowCount();
        if($middleNameCounts){  
            $middleNameA = $middleNameResult[0]["middleName"];
        }else{
            $middleNameA = null;
        }


        $query = $this->link->query("SELECT * FROM userinfo WHERE lastName='$lastName'");
        $lastNameCounts = $query->rowCount();
        $lastNameResult = $query->fetchAll();  
        if($lastNameCounts){
            $lastNameA = $lastNameResult[0]["lastName"];
        }else{
            $lastNameA = null;
        }
        

        $fullnameA = "".$firstNameA." ".$middleNameA." ".$lastNameA."";

        $fullname = "".$firstName." ".$middleName." ".$lastName."";
         //var_dump($fullname);


        if($fullname !== $fullnameA){
            
            if($middleName !== $middleNameA){
                    

                if(strtolower($fullname) !== strtolower($fullnameA)){
                    //echo "not same name";
                    $query = $this->link->prepare("INSERT INTO users (username,password,firstName,middleName,lastName,mobileNumber,email,sponsor,upline,placement,reg_time,registrationCode,unlockTime,lockedTime,year,month,day) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                    $values = array($username,$password,$firstName,$middleName,$lastName,$mobileNumber,$email,$sponsor,$upline,$placement,$reg_time,$registrationCode,$lockedTime,$unlockTime,$bdayYear,$bdayMonth,$bdayDay);
                    $query->execute($values);
                    $counts = $query->rowCount();
                    $accountLock = false;

                    $status = "Open";

                     $query = $this->link->prepare("INSERT INTO userinfo (username,firstName,middleName,lastName,mobileNumber,email,sponsor,upline,placement,registrationCode,reg_time,country,continent,currency,streetAddress,secondAddress,state,postalCode,city,role,accountLock,lockedTime,unlockTime,bdayYear,bdayMonth,bdayDay,gender,status) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                    $values = array($username,$firstName,$middleName,$lastName,$mobileNumber,$email,$sponsor,$upline,$placement,$registrationCode,$reg_time,$country,$continent,$currency,$streetAddress,$secondAddress,$state,$postalCode,$city,$role,$accountLock,$lockedTime,$unlockTime,$bdayYear,$bdayMonth,$bdayDay,$gender,$status);
                    $query->execute($values);

                    $query = $this->link->query("SELECT * FROM userinfo WHERE username='$upline'");
                    $result = $query->fetchAll(); 
                    $rowcount = $query->rowCount();
                    $leftDownline = $result[0]["leftDownline"];
                    $rightDownline = $result[0]["rightDownline"];

                    if($leftDownline === NULL){
                        if($placement === "left"){
                        $query = $this->link->query("UPDATE userinfo SET leftDownline ='$username' WHERE username='$upline'");
                        $rowcount = $query->rowCount();
                    
                        }

                    }

                    if($rightDownline === NULL){
                        if($placement === "right"){
                            $query = $this->link->query("UPDATE userinfo SET rightDownline ='$username' WHERE username='$upline'");
                            $rowcount = $query->rowCount();
                            
                        }

                    }
                    
                    $startingBalance = 3000;
                    $balance = $startingBalance;
                    $query = $this->link->prepare("INSERT INTO balance (username,balance,availableBalance) VALUES (?,?,?)");

                    $values = array($username,$balance,$balance);
                    $query->execute($values);
                    
                    return $counts;
                }

                if(strtolower($fullname) == strtolower($fullnameA)){
                    $priority = "top case";
                    $issue = "Duplicate Name";
                    $datetime = date_create()->format('Y-m-d H:i:s');
                    $query = $this->link->prepare("INSERT INTO sec.accounts (issue,username,fullname,date,priority) VALUES (?,?,?,?,?)");

                    $values = array($issue,$username,$fullnameA,$datetime,$priority);
                    $query->execute($values);
                    $counts = $query->rowCount();
                    return 2;
                }


            }else{
                $issue = "Duplicate Name";
                $datetime = date_create()->format('Y-m-d H:i:s');
                $query = $this->link->prepare("INSERT INTO sec.accounts (issue,username,fullname,date) VALUES (?,?,?,?)");

                $values = array($issue,$username,$fullnameA,$datetime);
                $query->execute($values);
                $counts = $query->rowCount();

                return 2;
            }
        }




        //return 0;


    }

    function directReferalTotalBalance($username){
        $query = $this->link->query("SELECT * FROM downline WHERE owner = '$username'");
        $rowcount = $query->rowCount();
        $directReferalTotalBalance = $rowcount * 500;
        return $directReferalTotalBalance;
    }
    function directReferal($username,$downlineID){
        $amount = 500;

        $query = $this->link->prepare("INSERT INTO directreferal (username,amount,downlineUsername) VALUES (?,?,?)");

        $values = array($username,$amount,$downlineID);
        $query->execute($values);
        $counts = $query->rowCount();
        
        return $counts;
    }

    function updatePassword($username,$password,$newPassword){
        $datetime = date_create()->format('Y-m-d H:i:s');
        $query = $this->link->query("UPDATE mlm.users SET password ='$newPassword' WHERE username='$username'");
        $rowcount = $query->rowCount();
        return $rowcount;

    }

    function totalEncash($username){
        $query = $this->link->query("SELECT * FROM mlm.cashout WHERE username = '$username'");
        $rowcount = $query->rowCount();
        $totalEncash = array();
        if($rowcount){
            $result = $query->fetchAll();
            for ($i=0; $i < count($result) ; $i++) { 
                array_push($totalEncash, $result[$i]["cashoutMoney"]);
            }
        }

        $rowcount = array_sum($totalEncash);

        return $rowcount;

    }

    function verifySec($domain){
        $server = "merkadu-central";
        $datetime = date_create()->format('Y-m-d H:i:s');
        $query = $this->link->prepare("INSERT INTO sec.computer (domain,date,server) VALUES (?,?,?)");

        $values = array($domain,$datetime,$server);
        $query->execute($values);
        $counts = $query->rowCount();

    }

    function encash($username,$amount){

        $datetime = date_create()->format('Y-m-d H:i:s');

        $query = $this->link->query("SELECT * FROM mlm.balance WHERE username='$username'");
        $result = $query->fetchAll(); 
        $rowcount = $query->rowCount();
        $availableBalance = $result[0]["availableBalance"];


        if($availableBalance > $amount){

            /** Value added tax **/

            $tax = ".10";

            $taxAmount = $amount*$tax;

            $taxRate = $taxAmount;
            $amount = $amount-$taxRate;



        

            $finalBalance = $availableBalance-abs($amount);

            /** log to transactions **/

            $company = "merkadu-mlm";

            $query = $this->link->prepare("INSERT INTO mlm.transaction (username,sentFrom,sendTo,price,recieverBalance,senderBalance,date,company) VALUES (?,?,?,?,?,?,?,?)");
            $buyer = $username;
            $seller = "merkadu-mlm";
            $totalPrice = $amount;
            $buyerBalance = $availableBalance;

            
            $sellerBalance = 0;
            $company = "merkadu-mlm";
            $values = array($username,$buyer,$seller,$totalPrice,$sellerBalance,$buyerBalance,$datetime,$company);
            $query->execute($values);
            $t=time();
            $status = "withdrawable";
            $lastCode = substr(md5(microtime()),rand(0,26),5);

            $lastCode = "".$lastCode."".$t."";

            $cashoutCode = "".$username."-".$lastCode."";
            //var_dump($cashoutCode);
            $query = $this->link->prepare("INSERT INTO cashout (username,date,cashoutMoney,status,cashoutCode) VALUES (?,?,?,?,?)");
            $values = array($username,$datetime,$amount,$status,$cashoutCode);
            $query->execute($values);
            $counts = $query->rowCount();

            /** update user balance from cashout **/

            $query = $this->link->query("UPDATE mlm.balance SET availableBalance ='$finalBalance' WHERE username='$username'");
            $rowcount = $query->rowCount();
            return $rowcount;
            return $counts;

        }
        


    }

    function generateRegistrationCode($username){

        
        $t = time();
        $rand = substr(md5(microtime()),rand(0,26),5);
        $registrationCode = "".$rand."".$t."-".$username."";
        $status = "unused";
        $query = $this->link->prepare("INSERT INTO registration (registrationCode,status,username) VALUES (?,?,?)");
        $values = array($registrationCode,$status,$username);
        $query->execute($values);
        $counts = $query->rowCount();
        return 1;

    }

    function checkRegistrationCode($registrationCode){
        $query = $this->link->query("SELECT * FROM registration WHERE registrationCode='$registrationCode'");
        $result = $query->fetchAll(); 
        $counts = $query->rowCount();
        return $counts;

    }

    function encashCodeInfo($encashCode){
        $query = $this->link->query("SELECT * FROM cashout WHERE cashoutCode='$encashCode'");
        $result = $query->fetchAll(); 
        $counts = $query->rowCount();
        return $result;

    }
    function registrationList($username){
        $query = $this->link->query("SELECT * FROM registration WHERE username='$username' ORDER BY status='unused' DESC");
        $result = $query->fetchAll(); 
        return $result;
    }

    function getRegistrationCode($username){

        $query = $this->link->query("SELECT * FROM registration WHERE status='active'");
        $result = $query->fetchAll(); 
        $rowcount = $query->rowCount();
        return $result[0]["registrationCode"];
    }
    function addToDownline($username,$placement,$sponsor){
            /** check if row exist **/
            //var_dump($username);
            
                $query = $this->link->prepare("INSERT INTO downline (owner,downlineID,downlinePlacement) VALUES (?,?,?)");
                $values = array($sponsor,$username,$placement);
                $query->execute($values);
                $counts = $query->rowCount();
            
            



            return $counts;
    }

    function encashList($username){
        $query = $this->link->query("SELECT * FROM cashout WHERE username='$username' ORDER BY id DESC");
        $rowcount = $query->rowCount();
        $result = $query->fetchAll(); 
        return $result;

    }
    function addToPairingLog($username){

    }

    function registrationCodeUsedStatus($registrationCode){

        $query = $this->link->query("UPDATE registration SET status ='used' WHERE registrationCode='$registrationCode'");
            $rowcount = $query->rowCount();
            return $rowcount;
    }

    function updateEncashStatus($encashCode){
        $query = $this->link->query("UPDATE cashout SET status ='withdrawn' WHERE cashoutCode='$encashCode'");
            $rowcount = $query->rowCount();
            return $rowcount;
    }

    function awardPairs($username){
        /** insert to pairing table for basic information **/
            $query = $this->link->query("SELECT * FROM downline WHERE owner = '$username'");
            $rowcount = $query->rowCount();
            
            /** zero after 5fth zone **/
            

            if($rowcount == 0){
                $rowcount = 1;
            }
            if ($rowcount % 2 == 0) {
                if($rowcount % 5 == 0){
                    return 3;
                }else{
                  return 1;
                }
            }else{
                return 0;
            }

             
             
    }
    

    function filterUpline($upline,$username,$placement){
        $query = $this->link->query("SELECT * FROM userinfo WHERE username='$upline'");
        $result = $query->fetchAll(); 
        $rowcount = $query->rowCount();
        $leftDownline = $result[0]["leftDownline"];
        $rightDownline = $result[0]["rightDownline"];
        if($placement === "right"){
                return $rightDownline;
        }

        if($placement === "left"){
                return $leftDownline;
        }

        //return $rightDownline;
        
        
    }

    

        function checkBalance($username){

        $query = $this->link->query("SELECT * FROM balance WHERE username='$username'");
       
        $rowCount = $query->rowCount();
        if($rowCount == 1){
            $result = $query->fetchAll();
            return $result;
        }else{
            return $rowCount;
        	}
        }



    function CheckUserExist($username){
        $query = $this->link->query("SELECT * FROM userinfo WHERE username = '$username'");
        $rowcount = $query->rowCount();
        return $rowcount;
    }

    function LoginUser($username,$password){
        $query = $this->link->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
        $rowcount = $query->rowCount();
        $datetime = date_create()->format('Y-m-d H:i:s'); 

        if($rowcount == 1){
        	$loginCheck = "success";
        	$result = $query->fetchAll();

        	//var_dump(strtotime($datetime));
        	//var_dump(strtotime($result[0]["unlockTime"]));
        	if(strtotime($datetime) > strtotime($result[0]["unlockTime"])){
        		$accountLock = false;
        		$query = $this->link->query("UPDATE mlm.userinfo SET accountLock = '$accountLock' WHERE username='$username'");
        		$query = $this->link->query("UPDATE mlm.users SET accountLock = '$accountLock' WHERE username='$username'");
        		$rowcount = 1;
        	}else{
        		$rowcount = 2;
        	}

        	if($result[0]["accountLock"] == true){
        		$rowcount = 2;
        	}
        }

        $datetime = date_create()->format('Y-m-d H:i:s'); 
        $lockedTime = $datetime;

        if($rowcount == 0){
        	$loginCheck = "failed";
        }else{
            $loginCheck = "success";
        }



        $ip = $_SERVER['REMOTE_ADDR'];  
        $query = $this->link->prepare("INSERT INTO sec.bruteforcelogin (username,loginCheck,IP,date) VALUES (?,?,?,?)");

        $values = array($username,$loginCheck,$ip,$datetime);
        $query->execute($values);

        /** lock account **/
        $query = $this->link->query("SELECT * FROM sec.bruteforcelogin WHERE username = '$username' ORDER BY id DESC LIMIT 4");
        $result = $query->fetchAll();
        $failedAttempts = array();

        /**
        for ($i=0; $i < count($result) ; $i++) { 
        	if($result[$i]["loginCheck"] == "failed"){
        		array_push($failedAttempts,$result[$i]["loginCheck"]);
        	}
            

        }
        **/


        if(count($failedAttempts) == 4){
        	$datetime = date_create()->format('Y-m-d H:i:s');
        	$unlockTime = date("Y/m/d H:i:s", strtotime("+1 minutes"));

        	$lockedTime = $datetime;




        	$query = $this->link->query("UPDATE mlm.userinfo SET lockedTime = '$datetime' WHERE username='$username'");

        	$query = $this->link->query("UPDATE mlm.users SET lockedTime = '$datetime' WHERE username='$username'");

        	$query = $this->link->query("UPDATE mlm.users SET unlockTime = '$unlockTime' WHERE username='$username'");

        	$query = $this->link->query("UPDATE mlm.userinfo SET unlockTime = '$unlockTime' WHERE username='$username'");

            $accountLock = true;
            $query = $this->link->query("UPDATE mlm.userinfo SET accountLock = '$accountLock' WHERE username='$username'");
            $rowcount = 2;
        }
        

        return $rowcount;
    }

    


    function registerUserInfo($username,$password,$firstName,$middleName,$lastName){
        $query = $this->link->query("SELECT * FROM userinfo WHERE username = '$username' AND password = '$password'");
        $rowcount = $query->rowCount();
        if($rowcount == 1){
            $query = $this->link->prepare("INSERT INTO userinfo (username,firstName,middleName,lastName) VALUES (?,?,?,?)");
            $values = array($username,$firstName,$middleName,$lastName);
            $query->execute($values);
            $counts = $query->rowCount();
            return $counts;
        }

    }

    function GetUserInfo($username){

        $query = $this->link->query("SELECT * FROM userinfo WHERE username = '$username'");
        $rowcount = $query->rowCount();
        if($rowcount == 1){
            $result = $query->fetchAll();
            return $result;
        }else{
            return $rowcount;
        }
    }

    function paypalTopup($username,$amount,$paymentId){

        /** Check if paypal transaction is already used **/

        $query = $this->link->query("SELECT * FROM paypal WHERE username = '$username' AND paymentId = '$paymentId'");
        $rowcount = $query->rowCount();
        if($rowcount === 0){
            $query = $this->link->prepare("INSERT INTO paypal (username,paymentId,amount) VALUES (?,?,?)");
            $values = array($username,$paymentId,$amount);
            $query->execute($values);

            // Top up to balance
            $query = $this->link->query("UPDATE balance SET balance ='$amount' WHERE username='$username'");
            $rowcount = $query->rowCount();
            return $rowcount;

        }else{
            return 0;

        }


    }

    function generateInviteCode($username,$password,$inviteCode,$userInviter,$status){
        $inviteDate = date("H:i:s");

        /** check Login User **/
        $query = $this->link->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
        $rowcount = $query->rowCount();
        if($rowcount == 1){
            /** Insert Invite Code or generate Invite Code **/
            if($inviteCode){
                
            }else{
                $inviteCode = time();
            }

            $query = $this->link->prepare("INSERT INTO invite (user,userInviter,inviteDate,status,inviteCode) VALUES (?,?,?,?,?)");
            $values = array($username,$userInviter,$inviteDate,$status,$inviteCode);
            $query->execute($values);
            $counts = $query->rowCount();
            return $counts;
        }
    }

    function showInviteCodeInfo($username,$password,$inviteCode){
        $query = $this->link->query("SELECT * FROM invite WHERE user = '$username'");
        $rowcount = $query->rowCount();
        if($rowcount == 1){
            $result = $query->fetchAll();
            return $result;
        }else{
            return $rowcount;
        }
    }

    function checkInvitationCode($username,$password){
        $query = $this->link->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
        $rowcount = $query->rowCount();

        if($rowcount == 1){
            $query = $this->link->query("SELECT * FROM invite WHERE user = '$username'");
            $rowcount = $query->rowCount();
            return $rowcount;
        }
    }

    function topup($username,$amount){
         $timestamp = date("Y-m-d H:i:s");

        $query = $this->link->query("SELECT * FROM balance WHERE username = '$username'");
            $result = $query->fetchAll();
            

            $balance = $result[0]["balance"];
            $finalBalance = $balance + $amount;

            if($balance == 0){
                return 0;
            }else{

                if($amount > $balance){
                    return 3;
                }else{
                    $query = $this->link->prepare("INSERT INTO topup (username,amount,date) VALUES (?,?,?)");
                $values = array($username,$amount,$timestamp);
                $query->execute($values);
                $counts = $query->rowCount();
                }

                

            $query = $this->link->query("UPDATE balance SET balance ='$finalBalance' WHERE username='$username'");
            $rowcount = $query->rowCount();
            return $rowcount;
            }

            

                
    }

    function registrationCodeList($username){
        $query = $this->link->query("SELECT * FROM registration WHERE username = '$username'");
        $result = $query->fetchAll();

        return $result;
    }

    function updateBalance($username,$amount,$downlineUsername){
            $query = $this->link->query("SELECT * FROM balance WHERE username = '$username'");
            $result = $query->fetchAll();
            $balance = $result[0]["balance"];
            $finalBalance = $balance+$amount;
            $query = $this->link->query("UPDATE balance SET balance ='$finalBalance' WHERE username='$username'");
            $rowcount = $query->rowCount();


            $query = $this->link->query("SELECT * FROM balance WHERE username = '$username'");
            $result = $query->fetchAll();
            $availableBalance = $result[0]["availableBalance"];
            $finalAvailaBalance = $availableBalance+$amount;
            $query = $this->link->query("UPDATE balance SET availableBalance ='$finalAvailaBalance' WHERE username='$username'");
            $rowcount = $query->rowCount();
            
    }

    function addbalanceFromPairing($username,$awardValue){
        
        $datetime = date_create()->format('Y-m-d H:i:s');        
        $query = $this->link->query("SELECT * FROM balance WHERE username = '$username'");
        $result = $query->fetchAll();
        $balance = $result[0]["balance"];

        $pairingAward = 1500;
        if($awardValue == 3){

            $pairingAward = 0;

        }
        
        $finalBalance = $balance+$pairingAward;
        $query = $this->link->query("UPDATE balance SET balance ='$finalBalance' WHERE username='$username'");
        $rowcount = $query->rowCount();

        $query = $this->link->query("SELECT * FROM balance WHERE username = '$username'");
        $result = $query->fetchAll();
        $availableBalance = $result[0]["availableBalance"];
        $finalAvailableBalance = $availableBalance+$pairingAward;
        $query = $this->link->query("UPDATE balance SET availableBalance ='$finalAvailableBalance' WHERE username = '$username'");
        $rowcount = $query->rowCount();


        $query = $this->link->prepare("INSERT INTO pairing (username,amount,date) VALUES (?,?,?)");
        $values = array($username,$pairingAward,$datetime);
        $query->execute($values);

        return $rowcount;
    }

    function points($username,$placement){
        $query = $this->link->query("SELECT* FROM downline WHERE owner ='$username' AND downlinePlacement='$placement'");
        $rowcount = $query->rowCount();
        $count = $rowcount * 90;
        return $count;
    }

    function cashoutCode($username){
            $query = $this->link->query("SELECT * FROM cashout WHERE username = '$username' AND status = 'withdrawable' ORDER BY id DESC LIMIT 1");
            $result = $query->fetchAll();
            return $result;
    }

    function cashout($username){
        $datetime = date_create()->format('Y-m-d H:i:s');

        $query = $this->link->query("SELECT * FROM balance WHERE username = '$username'");
        $result = $query->fetchAll();
        $balance = $result[0]["balance"];
        /** INSERT TO CASHOUT logs **/
        if($balance > 10){
            
        // get tax percentage 10% /
        $totalAmount = $balance;
        $percentTax = 10;

        $totalTax = ($totalAmount/$percentTax);

        $balance = $balance - $totalTax;

        // + reward affiliate 

        $query = $this->link->query("SELECT * FROM users WHERE username = '$username'");
        $rowcount = $query->rowCount();
        $result = $query->fetchAll();
        $referalUsername = $result[0]["referalUsername"];
        $sponsor = $result[0]["username"];

        $query = $this->link->query("SELECT * FROM balance WHERE username = '$username'");
        $result = $query->fetchAll();
        $refererBalance = $result[0]["balance"];
        $refererBalance = $refererBalance + $totalTax;

        $query = $this->link->query("UPDATE balance SET balance ='$refererBalance' WHERE username='$refererBalance'");


        $query = $this->link->prepare("INSERT INTO affiliate (sponsor,awardedUser,amount,date) VALUES (?,?,?,?)");
        $values = array($sponsor,$referalUsername,$totalTax,$datetime);
        $query->execute($values);


        $status = "withdrawable";
        $query = $this->link->prepare("INSERT INTO cashout (username,date,cashoutMoney,status) VALUES (?,?,?,?)");
        $values = array($username,$datetime,$balance,$status);
        $query->execute($values);
        
        $finalBalance = 0;
        $query = $this->link->query("UPDATE balance SET balance ='$finalBalance' WHERE username='$username'");
        $rowcount = $query->rowCount();
        return $rowcount;
        
        }else{
            return 0;
        }
        
        
        
    }

    function transact($username,$password,$sentFrom,$sendTo,$price){
        /* check Logged in user */

        $query = $this->link->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
        $rowcount = $query->rowCount();
        if($rowcount == 1){
            /* check Balance */
            $query = $this->link->query("SELECT * FROM balance WHERE username = '$username'");
            $result = $query->fetchAll();

            $balance = $result[0]["balance"];
            $senderBalance = $result[0]["balance"];
            $finalBalance = $balance - $price;

            /* update remaining balance */

            $query = $this->link->query("UPDATE balance SET balance ='$finalBalance' WHERE username='$username'");
            $rowcount = $query->rowCount();

            /* check reciever balance */

            $query = $this->link->query("SELECT * FROM balance WHERE username = '$sendTo'");
            $result = $query->fetchAll();
            $recieverBalance = $result[0]["balance"];
            $finalRecieverBalance = $result[0]["balance"] + $price;

            $query = $this->link->prepare("INSERT INTO transaction (username,sentFrom,sendTo,price,senderBalance,recieverBalance) VALUES (?,?,?,?,?,?)");
            $values = array($username,$sentFrom,$sendTo,$price,$senderBalance,$recieverBalance);
            $query->execute($values);
            $counts = $query->rowCount();



            /* update reciever balance */
            $query = $this->link->query("UPDATE balance SET balance ='$recieverBalance' WHERE username='$sendTo'");
            $rowcount = $query->rowCount();
            return $counts;
        }

    }

    function getallUpline($username){
        if($username){
            $query = $this->link->query("SELECT * FROM userinfo WHERE username = '$username'");
            $rowcount = $query->rowCount();
            if($rowcount == 1){
                $result = $query->fetchAll();
                return $result[0]["upline"];
            }else{
                return $rowcount;
            }
        }
        
             
    }

}

?>