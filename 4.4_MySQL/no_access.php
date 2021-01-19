<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

$public_access = true;
require_once "lib/autoload.php";

PrintHead();
PrintJumbo( $title = "Geen toegang", $subtitle = "" );
?>

<div class='alert alert-success'>U hebt heelaas geen toegang! Probeer opnieuw <a href="login.php">in te loggen.</a></div>
