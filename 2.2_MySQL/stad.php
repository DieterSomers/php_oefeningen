<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once 'connect_db.php';
require_once '../templates/html_components.php';
require_once '../templates/functions.php';

//3 afbeeldingen in een array
$images = GetData("SELECT * FROM images");

PrintHead();

?>

<body>

<?php
PrintJumbo("detail");
?>

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