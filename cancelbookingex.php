<?php

require "dbhandlerex.php";
session_start();


if((isset($_POST['cancelbtn1'])))
{
    $bid = $_POST['fbid'];
    $_SESSION['sessbid'] = $bid;
    $usid = $_SESSION['userid'];
    $sql = "SELECT  slot, bdate FROM booking WHERE bid=? AND usrid=? ;";
        $stmt = mysqli_stmt_init($connect);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt,"ss",$bid,$usid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result))
            {   

                $a = $row['slot'];
                $b = $row['bdate'];
                echo $a;
                echo $b;
                echo rtrim($a," AM");
                $atrim = rtrim($a," AM");
                $datetrim = explode("-",$b);
                $yr = $datetrim[0];
                $mnth = $datetrim[1];
                $dy = $datetrim[2];
                $bktime = mktime($a, 0, 0, $mnth, $dy, $yr);
                $curtime = time();
                $difference = $bktime - $curtime;
                if($difference > 86399)
                {

                    $sql = "DELETE FROM booking WHERE bid=?;";
                    $stmt = mysqli_stmt_init($connect);
                    if(!mysqli_stmt_prepare($stmt,$sql))
                    {
                    echo "<script>alert('SQL Error. Try Again!');</script>";
                    header("Location: ../index.php?error=sqlerror111");
                    exit();
                    }
                    else
                    {
                    mysqli_stmt_bind_param($stmt,"s",$bid);
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
                    echo 'Cancellation Charge';
                    // echo'<script> var r = confirm("The booking cancelation is within 24 hours. Please note that you will be levied a cancellation fee. Are you sure you want to cancel it?");
                    // if(r == true)
                    // {
                    //    header("Location: admin.php?error=bookingcancelled");
                    // }
                    // else
                    // {
                    //     return false;
                    // }
                    echo'<script> var r = confirm("Cancellation charge applicable. Continue ?");
                    if(r == true)
                    {
                        
                        window.location.href = "deleteex.php";
                        
                    }
                    else
                    {
                        
                        window.location.href = "cancelbooking.php";
                        
                    }
                    </script>';
                }

                
            }
            else
            {
                header("Location: ../index.php?error=usernotfound");
                exit();
            }


        }
    }


?>