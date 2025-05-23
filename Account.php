<?php
session_start();


require_once 'Database.php';
include 'Validation.php';

$last = $_POST['usr'];
$pwd = $_POST['pwd'];


//make sure there is valid input for the name 
validate($validName, $last);

//re-create ID number given on sign up
$custId = createCustId($last, $pwd);

//creates a session variable to be used in other files
$_SESSION['custId'] = $custId;

//Grabs customer data from the customer table
$query = 'SELECT l_name
          FROM customer
          WHERE cust_id = :custId';

$statement = $db->prepare($query);
$statement->bindValue(':custId', $custId);
$statement->execute();
//stores that information in an array
$customer = $statement->fetch();
$statement->closeCursor();

$name = $customer['f_name'];




//Grab car information 
$query = 'SELECT year_made, make, model
          FROM car
          WHERE cust_id = :custID';

$statement = $db->prepare($query);
$statement->bindValue(':custID', $custId);
$statement->execute();
$cars = $statement->fetchAll();
$statement->closeCursor();


?>


<!Doctype html>
<html>

<head>
    <?php include 'header.php'; ?>
    <link rel="stylesheet" href="Account.css">

</head>

<main>

    <body>
        <h1>Mac Auto</h1>
        <h3><?php echo $name; ?></h3>


        <form action="Add_Car.php">
            <input type="submit" value="Add Car">
        </form>

        <table>
            <thead>
                <tr>
                    <th>Car Year</th>
                    <th>Car Make</th>
                    <th>Car Model</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cars as $car): ?>
                    <tr>
                        <td><?php echo $car['year_made'] ?> </td>
                        <td><?php echo $car['make'] ?> </td>
                        <td><?php echo $car['model'] ?> </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


    </body>
</main>




</html>