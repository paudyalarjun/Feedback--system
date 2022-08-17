<?php
    define ('DB_HOST', 'localhost');
    define ('DB_USER', 'arjun');
    define ('DB_PASS', '123456');
    define ('DB_NAME', 'php_db');


//creating connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);


//Check the connection

if($conn->connect_error){
    die("Connection Failed " . $conn->connect_error);

}




?>