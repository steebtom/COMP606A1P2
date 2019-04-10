<?php

$msg = "First line of text\nSecond line of text";
$msg = wordwrap($msg,70);
mail("someone@example.com","My subject",$msg)
?>
