<?php
if(isset($_POST['signupbtn']))
{
    require "dbhandlerex.php";

    $name= $_POST['username'];
    $mail= $_POST['email'];
    $pwd= $_POST['password'];
    $pwdrepeat= $_POST['passwordrepeat'];


    if(empty($name) || empty($mail) || empty($pwd) || empty($pwdrepeat))
    {
        header("Location: ../signup.php?error=emptyfields&username=".$name."&email=".$mail);
        exit();
    }
    elseif(!filter_var($mail, FILTER_VALIDATE_EMAIL) && preg_match('/^[a-zA-Z0-9]$/', $name))
    {
        header("Location: ../signup.php?error=invalidemailusername");
        exit();
    }
    elseif(!filter_var($mail, FILTER_VALIDATE_EMAIL))
    {
        header("Location: ../signup.php?error=invalidemail&username=".$name);
        exit();
    }
    elseif(preg_match('/^[a-zA-Z0-9]$/', $name))
    {
        header("Location: ../signup.php?error=invalidusername&email=".$mail);
        exit();

    }
    elseif($pwd !== $pwdrepeat)
    {
        header("Location: ../signup.php?error=passwordmismatch&username=".$name."&email=".$mail);
        exit();
    }
    else
    {
        $sql = "SELECT usrid FROM users WHERE usrid=?;";
        $stmt = mysqli_stmt_init($connect);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location:../signup.php?error=sqlerr");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt,"s",$name);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $result = mysqli_stmt_num_rows($stmt);
            if($result > 0)
            {
                header("Location:../signup.php?error=useridexists");
                exit();
            }
            else
            {
                $sql = "INSERT INTO users (uname, email, pwd) VALUES (?,?,?)";
                $stmt = mysqli_stmt_init($connect);
                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location:../signup.php?error=sqlerr");
                    exit();
                }
                else
                {   
                    $pwdhasd = password_hash($pwd, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt,"sss",$name,$mail,$pwdhasd);
                    mysqli_stmt_execute($stmt);

                    header("Location:../signup.php?successfulsignup");
                    exit();

                }   
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($connect);
}

else
{
    header("Location:../signup.php");
    exit();
}
?>