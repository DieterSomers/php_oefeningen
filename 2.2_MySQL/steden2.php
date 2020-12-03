<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once 'connect_db.php';
require_once '../templates/html_components.php';

//functie om php data in array te steken
function GetData($sql_query) {
    global $conn_steden;
    return $conn_steden -> query($sql_query);
}

//3 afbeeldingen in een array
$images = GetData("SELECT * from images");

PrintHead();

?>

<body>

<?php
PrintJumbo("");
?>

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
