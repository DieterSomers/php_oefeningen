<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

$public_access = false;
require_once "lib/autoload.php";

PrintHead();
PrintJumbo( $title = "Leuke plekken in Europa" ,
    $subtitle = "Tips voor citytrips voor vrolijke vakantiegangers!" );

PrintNavbar();

foreach ($messages as $message)
{
    print "<div class='alert alert-success'>$message</div>";
}
?>


<div class="container">
    <div class="row">

        <?php

        //get data
        $data = GetData( "select * from images" );

        //get template
        $template = file_get_contents("templates/column.html");

        //merge
        $output = MergeViewWithData( $template, $data );
        print $output;
        ?>

    </div>
</div>

</body>
</html>