<?php
$servername="localhost";
$dbname="loginsignup";
$dbusername="adminUser";
$dbpassword="adminUser";

$connect=mysqli_connect($servername,$dbusername,$dbpassword,$dbname);

if(!$connect)
{
    die("Failed to connect to Database:".mysqli_connect_error());
}
?>