<?php



//Regex for validating inputs
$validPhone = '/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/';
$validName = '/^\w+/';


//Input validation function 
function validate($pattern, $input)
{
    if (preg_match($pattern, $input) != 1 || $input == null) {
        echo "Invalid input";
        header('Location: Sign_up.php');
        exit;
    }
}

function createCustId($last, $pwd)
{


    return ord($last) * ord($pwd);
}

function createCarId($vin){
    return substr($vin, 11);
}

