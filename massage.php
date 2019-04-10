<?php
require "header.php";                                                                 //Massage Page Layout

?>
<head>
<link rel="stylesheet" type="text/css" media="screen" href="./main.css">
</head>
<main>
    <div class=wrapper>
    
    <div class="jumbotron jumbotron-fluid">                                           <-- Jumbotron1 -->
        <div class="container">
          <h1 class="display-4">Massage 1</h1>
          <p class="lead">Athlete</p>
          <p class="lead">Login Now to Book</p>
          <?php
          if(isset($_SESSION['userid']))
    {
        echo '<form action="booking.php" class="signup-form" method="post"><button type="submit" class="btn btn-outline-dark" name="msg1">Book Now</button></form>';
    }
    ?>
        </div>                                                                        <-- Jumbotron2 -->
      </div>
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">Massage 2</h1>
          <p class="lead">Regular</p>
          <p class="lead">Login Now to Book</p>
          <?php
          if(isset($_SESSION['userid']))
    {
        echo '<form action="booking.php" class="signup-form" method="post"><button type="submit" class="btn btn-outline-dark" name="msg2">Book Now</button></form>';
        // echo '<a class="btn btn-default nva-link" href="booking.php">Signup</a>';
    }
    ?>
        </div>                                                                        <-- Jumbotron2 -->
      </div>
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">Massage 3</h1>
          <p class="lead">Spa</p>
          <p class="lead">Login Now to Book</p>
          <?php
          if(isset($_SESSION['userid']))
    {
        echo '<form action="booking.php" class="signup-form" method="post"><button type="submit" class="btn btn-outline-dark" name="msg3">Book Now</button></form>';
    }
    ?>
        </div>
      </div>

    </div>
</main>

<?php
require "footer.php"
?>