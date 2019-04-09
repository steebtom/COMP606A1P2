<?php
require "extra/dbhandlerex.php";
require "header.php";

    $suid = $_SESSION['userid'];
    echo $_SESSION['userid'];


        $sql = "SELECT  bid, msg, slot, bdate FROM booking WHERE usrid=? ;";
        $stmt = mysqli_stmt_init($connect);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt,"s",$suid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            echo '<table class="table">
                <thead class="thead-dark">
                  <tr>
                    
                    <th scope="col">Booking ID</th>
                    <th scope="col">Massage Type</th>
                    <th scope="col">Slot</th>
                    <th scope="col">Date</th>
                    <th scope="col"></th>
                    
                  </tr>
                </thead>
                <tbody>';

            while ($row = mysqli_fetch_assoc($result))
            {
              
              echo '<tr>';
              echo '<td>'.$row['bid'].'</td>';
              echo '<td>'.$row['msg'].'</td>';
              echo '<td>'.$row['slot'].'</td>';
              echo '<td>'.$row['bdate'].'</td>';
              // echo '<td><button type="submit" class="btn btn-outline-dark">Cancel Booking</button></td>';
              echo '<td><form method="post" action="cancelbooking.php">
                    <button type="submit" name="cancelbtn" class="btn btn-outline-dark">Cancel Booking</button>
                    </form></td>';
              echo '</tr>';

            
            }
          }
          ?>

            </tr>
            </tbody>
            </table>



    