<?php

$id = $_POST["img_id"];

require_once 'lib/connection_data.php';
// Create and check connection
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

foreach ($_POST as $item => $value)
{
    if (empty($value)) {

        echo $item . " is empty";

    } else {

        $sql = "update images set $item = '$value' where img_id = $id";
        $conn->query( $sql );

    }
}

echo "update completed";
echo "<a href=steden2.php>Terug naar overzicht</a>";

$conn = null;


?>