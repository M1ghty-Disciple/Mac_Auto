<?php



//Regex for validating inputs

$validName = '/^\w+/';


//Input validation function 
function validate($pattern, $input)
{
    if (preg_match($pattern, $input) != 1 || $input == null) {
        echo "Invalid input";
        header('Location: index.php');
        exit;
    }
}

function createCustId($last, $pwd)
{


    return ord($last) * ord($pwd);
}


