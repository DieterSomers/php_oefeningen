<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once ('../mysql_access/connection_data.php');

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
    <h1>Leuke plekken in Europa</h1>
    <p>Tips voor citytrips voor vrome vakantiegangers!</p>
</div>

<div class="container">
    <div class="row">

        <?php

        if ($images->num_rows > 0)
        {
            while($row = $images->fetch_assoc())
            {
                print '<div class="col-sm-4">';
                print '<h3>' . $row["img_title"] . '</h3>';
                print '<p>' . $row["img_width"] . ' x ' . $row["img_height"] . ' pixels</p>';
                print '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>';
                print '<img class="img-fluid" src="../1.2_bootstrap/img/' . $row["img_filename"] . '">';
                print '<a href="http://localhost/php_oefeningen/2.1_MySql/stad.php?img_id=' . $row["img_id"] . '">Meer info...</a>';
                print '</div>' ;
            }
        }
        else
        {
            echo "No records found";
        }

        $conn_steden -> close();

        ?>
    </div>
</div>

</body>
</html>
