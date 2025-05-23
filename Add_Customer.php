<?php
session_start();


require_once 'database.php';
include 'Validation.php';



//grabbing data from the signup form
$lName = strtoupper($_POST['last']);
$pwd = $_POST['pwd'];
$custId = createCustId($lName, $pwd);

//create a session variable
$_SESSION['custId'] = $custId; 


//validate inputs 
validate($validName, $lName);




//Adds new customer to the database
$query = "INSERT INTO customer
            (cust_id, last_name, pwd)
          VALUES
            (:custId,:lName,:pwd)";

$statement = $db->prepare($query);
$statement->bindValue(':custId', $custId);
$statement->bindValue(':lName', $lName);
$statement->bindValue(':pwd', $pwd);

$statement->execute();
$statement->closeCursor();


header("Location: Login.php");
exit;











