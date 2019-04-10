<?php

if(isset($_POST['bookbtn']))
{
    session_start();
    require "dbhandlerex.php";

    $fmtype = $_POST['mtype'];
    $fmtime = $_POST['mtime'];
    $fmdate = $_POST['mdate'];
    $fmdescrip = $_POST['mdescrip'];
    $fmcond1 = $_POST['mcond1'];
    $fmcond2 = $_POST['mcond2'];
    
    if(empty($fmtype) || empty($fmtime) || empty($fmdate) || empty($fmdescrip) || empty($fmcond1) || empty($fmcond2))
    {
        echo "alert('Fill empty Fields!');";
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    else
    {

    
        
        $sql = "SELECT * FROM booking WHERE bdate = ? AND slot = ?;";
        $stmt = mysqli_stmt_init($connect);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            echo "<script>alert('SQL Error!');</script>";
            header("Location: ../index.php?error=sqlerrorbook1");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt,"ss",$fmdate,$fmtime);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result))
            {
                if(($row['bdate'] == $fmdate) && ($row['slot'] == $fmtime))
                {   
                    echo "<script>alert('Booking Slot Unavailable!');</script>";
                    header("Location: ../massage.php?error=bookingslotunavailable");
                    exit();
                }
                else
                {
                    echo "<script>alert('SQL Error!');</script>";
                    header("Location: ../booking.php?error=sqlerrorbook2");
                    exit();
                }


            }
            else
            {

                $sql = "INSERT INTO booking (usrid, msg, slot, bdate, descrip, info1, info2) VALUES (?,?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($connect);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    echo "<script>alert('SQL Error!');</script>";
                    header("Location:../index.php?error=sqlerrorbook3");
                    exit();
                }

                else
                {
                mysqli_stmt_bind_param($stmt,"sssssss",$_SESSION['userid'],$fmtype,$fmtime,$fmdate,$fmdescrip,$fmcond1,$fmcond2);
                mysqli_stmt_execute($stmt);

                $msg = "Hi user your booking has been confirmed. Please note that you will charged a cancellation fees if you cancel a booking before 24hrs prior to the appointment date";
                $msg = wordwrap($msg,150);
                mail("user@example.com","Booking Confirmation",$msg);

                // $result = mysqli_stmt_get_result($stmt);
                echo "<script>alert('Booking Successful!');</script>";
                header("Location: ../index.php?success=booking");
                exit();
                }
               
            }
        }
    }

    
}
else
{
    header("Location: ../index.php");
    exit();
}




?>