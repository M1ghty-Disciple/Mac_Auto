<?php


//pdo arguements
$dsn = 'mysql:hostname=localhost;dbname=mac_auto';
$username = 'root';
$password = '';


try {
    //pdo object
    $db = new PDO($dsn, $username, $password);

} catch (PDOException $e) {
    $error_msg = $e->getMessage();
    exit("Database connection failed " . $error_msg);
}