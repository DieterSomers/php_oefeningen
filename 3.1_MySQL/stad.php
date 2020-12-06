<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once 'lib/pdo_getdata.php';
require_once 'lib/html_functions.php';

PrintHead();
PrintJumbo("Detail informatie stad");

?>

<div class="container">
    <div class="row">

        <?php

        //getData
        $rows = GetData("select * from images where img_id=". $_GET['img_id']);

        //getTemplate
        $template = file_get_contents("templates/column_detail.html");

        //merge
        $html = MergeViewWithData($template, $rows);
        print $html;

        ?>

    </div>
</div>

</body>
</html>