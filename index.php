<?php
require "header.php";
?>
<head>
<link rel="stylesheet" type="text/css" media="screen" href="./main.css">
</head>
<main>
    <div class=wrapper>
    
    <?php
    if(!isset($_SESSION['userid']))
    {
        echo '<div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">Thank You for visiting us.</h1>
          <p class="lead">Log in to continue !</p>
        </div>
      </div>';
    }
    else
    {
        echo '<div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">Welcome back.</h1>
          <p class="lead">You are now logged in.</p>
        </div>
        </div>';
    }
    ?>
    </div>
</main>

<?php
require "footer.php"
?>