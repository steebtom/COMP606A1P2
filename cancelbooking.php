<?php
// session_start();
if((isset($_POST['cancelbtn'])))                                                        //Cancel button submit check
{
    require "header.php";
    require "extra/dbhandlerex.php";


    echo     '<form action = "./extra/cancelbookingex.php" method = "POST">
                    <div class="form-group">
                    <label >Massage Type:</label>
                    <select class="form-control" name="fbid" required>';


    $suid = $_SESSION['userid'];
    echo $_SESSION['userid'];


    $sql = "SELECT bid FROM booking WHERE usrid=? ;";                                   //Preparing SQL Statement
        $stmt = mysqli_stmt_init($connect);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: ../index.php?error=sqlerrorcan1");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt,"s",$suid);
            mysqli_stmt_execute($stmt);                                                 //Executing Query
            $result = mysqli_stmt_get_result($stmt);


            while($row = mysqli_fetch_assoc($result))                                   //Displaying returned rows
            {
                echo '<option>'.$row['bid'].'</option>';
            }
            echo'
                    </select>
                    </div>
                    <div><button type="submit"  class="btn btn-outline-dark" name="cancelbtn1">Cancel Booking</button></div>
                </form>';
        }

        

}

else
{
    // header("Location: ../index.php");
    echo 'Page not Found';
    // exit();
}


