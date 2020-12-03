<?php

require_once ('../mysql_access/connection_data.php');

// Create connection
$conn_steden = new mysqli("localhost", "root", $password, "steden");

// Check connection
if ( $conn_steden->connect_error ) {
    die("Connection failed: " . $conn_steden->connect_error);
}

?>
