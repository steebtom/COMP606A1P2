<?php

if((isset($_POST['msg1']))||(isset($_POST['msg2']))||(isset($_POST['msg3'])))
{
    require "header.php";

    echo'
        <html>
        <head>
        <!-- <link rel="stylesheet" type="text/css" media="screen" href="./main.css"> -->
        </head>
        <body>

        <form action = "./extra/bookingex.php" method = "POST">
        <div class="form-group">
          <label >Massage Type:</label>
          <select class="form-control" name="mtype" required>
            <option>Massage 1</option>
            <option>Massage 2</option>
            <option>Massage 3</option>

          </select>
            </div>
            <div class="form-group">
          <label >Time Slot:</label>
          <select class="form-control" name="mtime" required>
            <option>Slot 1</option>
            <option>Slot 2</option>
            <option>Slot 3</option>

          </select>
            </div>
            <div class="form-group">
          <label>Date:</label>
          <input type="date" class="form-control" name= "mdate" placeholder="" required>
            </div>
            <div class="form-group">
          <label>Other Information and your Motivation to take our service:</label>
          
          <textarea class="form-control" rows="3" name="mdescrip" required></textarea>
            </div>
            <div class="form-group">
          <label>Current Injuries:</label>
          
          <div class="radio">
                <label><input type="radio" name="mcond1" checked> Yes</label>
                </div> 
                <div class="radio">
                <label><input type="radio" name="mcond1"> No</label>
            </div>
            </div>
            </div>
        
            <div class="form-group">
          <label>Psychologycal Condition:</label>
          <div class="radio">
            <label><input type="radio" name="mcond2" checked> Yes</label>
            </div>
            <div class="radio">
            <label><input type="radio" name="mcond2"> No</label>
            </div>
            </div>
            <div><button type="submit" class="btn btn-outline-dark" name="bookbtn">Book</button></div>
      </form>


        </body>
        </html>
        ';

}

else
{
    // header("Location: ../index.php");
    echo 'Page not Found';
    // exit();
}


