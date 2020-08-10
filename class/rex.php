<?php
//echo "hi";
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

    function disallowDuplicate(){
    	$firstName = "Rex";
		$middleName = "Cantago";
		$lastName = "Adrivan";
		$fullname = "$firstName $middleName $lastName";

		/* firstNameA */

		$query = $this->link->query("SELECT * FROM userinfo WHERE firstname='$firstName'");
        $result = $query->fetchAll(); 
        $rowcount = $query->rowCount();
        $firstNameA = $result[0]["firstName"];

        /* middleNameA */

        $query = $this->link->query("SELECT * FROM userinfo WHERE middleName='$middleName'");
        $result = $query->fetchAll(); 
        $rowcount = $query->rowCount();
        $middleNameA = $result[0]["middleName"];

        /* lastNameA */

        $query = $this->link->query("SELECT * FROM userinfo WHERE lastName='$lastName'");
        $result = $query->fetchAll(); 
        $rowcount = $query->rowCount();
        $lastNameA = $result[0]["lastName"];

        $fullnameA = "$firstNameA $middleNameA $lastNameA";



		if(strtolower($fullname) == strtolower($fullnameA)){
			echo "DUPLICATE";
		};
    }


    }


$users = new ManageUsers();
$j = $users->disallowDuplicate();

?>