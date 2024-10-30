<?php

$servername="localhost";
$username="root";
$password="";
$db_name="ecommerce";

$conn=mysqli_connect("localhost","root","","ecommerce");

if($conn->connect_error){
    die("Connection failed");
}
?>