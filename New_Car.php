<?php
session_start();
require_once 'Database.php';




//////////NOTE//////////////////
//CREATE ERROR HANDLING TO CHECK INFORMATION
$yearMade = $_POST['year'];
$model = $_POST['model'];
$make = $_POST['make'];
$vin = $_POST['vin'];

$custId = $_SESSION['custId'];

$query = 'INSERT INTO car
            (cust_id,  make, model, year, vin)
          VALUEs
          (:custId, :make, :model, :year, :vin)';

$statement = $db->prepare($query);
$statement->bindValue(':custId', $custId);
$statement->bindValue(':make', $make);
$statement->bindValue(':model', $model);
$statement->bindValue(':year', $yearMade);
$statement->bindValue(':vin', $vin);
$statement->execute();
$statement->closeCursor();

header('Location: Account.php');
exit;