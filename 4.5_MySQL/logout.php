<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

$public_access = false;
require_once "lib/autoload.php";

$_SESSION['user'] = null;
session_destroy();

header("Location: login.php?logout=true");

?>
