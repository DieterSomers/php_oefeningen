<?php
session_start();

require_once "connection_data.php";
require_once "pdo.php";
require_once "html_functions.php";
require_once "form_elements.php";
require_once "sanitize.php";
require_once "validate.php";
require_once "security.php";

$errors = [];
$old_post = [];
$messages = [];

if ( key_exists('msgs', $_SESSION)  AND is_array( $_SESSION['msgs']))
{
    $messages = $_SESSION['msgs'];
}

if ( key_exists( 'errors', $_SESSION ) AND is_array( $_SESSION['errors']) )
{
    $old_post = $_SESSION['OLD_POST'];

    $errors = $_SESSION['errors'];
}

$_SESSION['msgs'] = [];
$_SESSION['OLD_POST'] = [];
$_SESSION['errors'] = [];