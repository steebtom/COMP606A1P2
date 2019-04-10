<?php
if(isset($_POST['loginbtn']))
{   
    // $flag=0;
    require "dbhandlerex.php";

    $umail = $_POST['mailuid'];
    $pass = $_POST['pwd'];
    
    if(empty($umail) || empty($pass))
    {
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    else
    {

        if($umail == 'admin' && $pass == 'admin')
        {
            header("Location: ../admin.php");
            exit();
        }



        else
        {
        $sql = "SELECT * FROM users WHERE uname=? OR email=?;";
        $stmt = mysqli_stmt_init($connect);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            echo "<script>alert('SQL Error!');</script>";
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt,"ss",$umail,$umail);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result))
            {
                $pwdchk = password_verify($pass,$row['pwd']);
                if($pwdchk == false)
                {
                    echo "<script>alert('Incorrect Password!');</script>";
                    header("Location: ../index.php?error=incorrectpassword");
                    exit();
                }
                else if(pwdchk == true)
                {
                    session_start();
                    $_SESSION['userid'] = $row['usrid'];
                    $_SESSION['username'] = $row['uname'];
                    header("Location: ../index.php?successfullogin");
                    exit();
                }
            }
            else
            {
                echo "<script>alert('User not Found!');</script>";
                header("Location: ../index.php?error=usernotfound");
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