<?php
$servername="localhost";
$dbname="loginsignup";
$dbusername="clientUser";
$dbpassword="clientUser";

$connect=mysqli_connect($servername,$dbusername,$dbpassword,$dbname);

if(!$connect)
{
    die("Failed to connect to Database:".mysqli_connect_error());
}
?>