<?php

require "header1.php";
require "extra/dbhandlerex1.php";

    


        $sql = "SELECT  bid, usrid, msg, slot, bdate, descrip, info1, info2, btime FROM booking;";
        $stmt = mysqli_stmt_init($connect);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            echo "<script>alert('SQL Error!');</script>";
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else
        {
            
            mysqli_stmt_execute($stmt);                                         //SQL Statement Execution
            $result = mysqli_stmt_get_result($stmt);                            //Getting Results and Displaying data in table

            echo '<table class="table">
                <thead class="thead-dark">
                  <tr>
                    
                    <th scope="col">Booking ID</th>
                    <th scope="col">User ID</th>
                    <th scope="col">Massage Type</th>
                    <th scope="col">Slot</th>
                    <th scope="col">Date</th>
                    <th scope="col">Desription</th>
                    <th scope="col">Current Injuries</th>
                    <th scope="col">Psychologycal Condition</th>
                    <th scope="col">Booking Time</th>
                    
                  </tr>
                </thead>
                <tbody>';

            while ($row = mysqli_fetch_assoc($result))                          //Executes if query returs any row
            {
                                                                                    
              echo '<tr>';
              echo '<td>'.$row['bid'].'</td>';
              echo '<td>'.$row['usrid'].'</td>';
              echo '<td>'.$row['msg'].'</td>';
              echo '<td>'.$row['slot'].'</td>';
              echo '<td>'.$row['bdate'].'</td>';
              echo '<td>'.$row['descrip'].'</td>';
              echo '<td>'.$row['info1'].'</td>';
              echo '<td>'.$row['info2'].'</td>';
              echo '<td>'.$row['btime'].'</td>';
              echo '</tr>';

            
            }
          }
          ?>

            </tr>
            </tbody>
            </table>



    