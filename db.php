<?php
$servername = "localhost";
$username = "root";
$password = "Root@123";
$dbname = "Domain_Crud";

$conn = new mysqli(hostname:$servername,username:$username,password:$password,database:$dbname);

if ($conn->connect_error){
    die("Connection Error ".mysqli_connect_error());
}


?>
