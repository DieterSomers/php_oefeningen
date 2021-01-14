<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";

PrintHead();
PrintJumbo( $title = "Registreer gebruiker", $subtitle = "" );
?>

<div class="container">
    <div class="row">

        <?php
        //if ( ! is_numeric( $_GET['usr_id']) ) die("Ongeldig argument " . $_GET['usr_id'] . " opgegeven");

        //get data
        $data = [ 0 => [ "usr_voornaam" => "", "usr_naam" => "", "usr_email" => "", "usr_password" => "" ]];
        if($old_post != null) {
            $data = [ 0 => [ "usr_voornaam" => $old_post['usr_voornaam'], "usr_naam" => $old_post['usr_naam'], "usr_email" => $old_post['usr_email'], "usr_password" => $old_post['usr_password']]];

        }

        //$data = GetData( "select * from images where img_id=" . $_GET['img_id'] );
        $row = $data[0]; //there's only 1 row in data

        //add extra elements
        $extra_elements['csrf_token'] = GenerateCSRF( "register.php"  );
        $_SESSION['msgs'] = 'Bedankt voor uw registratie!';


        //get template
        $output = file_get_contents("templates/register.html");

        //merge
        $output = MergeViewWithData( $output, $data );
        $output = MergeViewWithExtraElements( $output, $extra_elements );
        $output = MergeViewWithErrors( $output, $errors );
        $output = RemoveEmptyErrorTags( $output, $data );

        print $output;
        ?>

    </div>
</div>

</body>
</html>