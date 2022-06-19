<?php

require 'partials/db_conn.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
$email =$_POST['email'];
$desc =$_POST['desc'];

$sql ="INSERT INTO `contact` ( `email`, `description`) VALUES ('$email', '$desc'); ";
$result =mysqli_query($conn,$sql);
if(!$result){
die("Error ".mysqli_error($conn));
}
else{
    echo '<script type="text/JavaScript"> 
        alert("Message Sent successfully!");
        location.href ="index.php";
        </script>';

}

}
?>