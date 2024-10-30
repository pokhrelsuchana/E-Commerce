<?php

$servername="localhost";
$username="root";
$password="";
$db_name="users";

$conn=mysqli_connect("localhost","root","","users");

if($conn->connect_error){
    die("Connection failed");
}
?>