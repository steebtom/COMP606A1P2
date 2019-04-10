<?php
session_start();
require "dbhandlerex.php";
if((isset($_SESSION['sessbid'])))
{   
    $sessbid1 = $_SESSION['sessbid'];
    $sql = "DELETE FROM booking WHERE bid=?;";
    $stmt = mysqli_stmt_init($connect);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        echo "<script>alert('Error. Try Again!');</script>";
        header("Location: ../index.php?error=sqlerror111");
        exit();
    }
    else
    {
        mysqli_stmt_bind_param($stmt,"s",$sessbid1);
        $status = mysqli_stmt_execute($stmt);
        if($status)
        {
            echo "<script>alert('Booking Deleted!');</script>";
            header("Location: ../index.php?successfullydeleted");
            exit();
        }
        else
        {
            echo "<script>alert('Error. Try Again!');</script>";
            header("Location: ../index.php?error=notdeleted");
            exit();
        }
    }

}
else
{
    echo "<script>alert('No Booking Deleted!');</script>";
    header("Location: ../index.php?error=nodeleteatdelete.php");
    exit();
}