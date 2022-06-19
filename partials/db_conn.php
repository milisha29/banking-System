<?php

//Connection to the database
$servername ="localhost";
$username ="root";
$pass ="";
$database="bankingSystem"; 
$conn =mysqli_connect($servername,$username,$pass,$database);

if(!$conn){
    die('Error: '.mysqli_connect_error());
}

?>