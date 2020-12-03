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
    PrintJumbo("");
?>

<div class="container">
    <div class="row">

        <?php

        if ($images->num_rows > 0)
        {
            while($row = $images->fetch_assoc())
            {
                PrintColumn($row);
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
