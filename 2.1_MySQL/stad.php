<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

// Create connection
$conn_steden = new mysqli("localhost", "root", $password, "steden");

// Check connection
if ( $conn_steden->connect_error ) {
    die("Connection failed: " . $conn_steden->connect_error);
}

//functie om php data in array te steken
function GetData($sql_query) {
    global $conn_steden;
    return $conn_steden -> query($sql_query);
}

//3 afbeeldingen in een array
$images = GetData("SELECT * from images");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>

<div class="jumbotron text-center">
    <h1>Detail stad</h1>
</div>

<div class="container">
    <div class="row">

        <?php

        $detail = GetData("SELECT * from images where img_id = " .$_GET['img_id']);
        $detail = $detail->fetch_assoc();

        print '<div class="col-sm-9">';
        print '<h3>' . $detail["img_title"] . '</h3>';
        print '<p>' . $detail["img_width"] . ' x ' . $detail["img_height"] . ' pixels</p>';
        print '<img class="img-fluid" src="../1.2_bootstrap/img/' . $detail["img_filename"] . '">';
        print '<a href="http://localhost/php_oefeningen/2.1_MySql/steden2.php">Terug naar overzicht</a>';
        print '</div>' ;

        $conn_steden -> close();

        ?>
    </div>
</div>

</body>
</html>