<?php

require_once "autoload.php";

if ( LoginCheck() )
{
    header("Location: ../steden.php");
}
else
{
    unset( $_SESSION['user'] );
    header("Location: ../no_access.php");
}


function LoginCheck()
{
    if ( $_SERVER['REQUEST_METHOD'] == "POST" )
    {
        //controle CSRF token
        if ( ! key_exists("csrf", $_POST)) die("Missing CSRF");
        if ( ! hash_equals( $_POST['csrf'], $_SESSION['lastest_csrf'] ) ) die("Problem with CSRF");

        $_SESSION['lastest_csrf'] = "";

        //sanitization
        $_POST = StripSpaces($_POST);
        $_POST = ConvertSpecialChars($_POST);

        //validation
        $sending_form_uri = $_SERVER['HTTP_REFERER'];

        //check bestaand email en passwoord correct
        $user_list = GetData("select * from user");
        foreach ($user_list as $rows)
        {
            if ($rows["usr_email"] == $_POST["usr_email"] && password_verify($_POST["usr_password"], $rows["usr_password"]))
            {
                $login_success = true;
                $_SESSION['user'] = $rows;
                $_SESSION['msgs'][] = "Welkom " . $rows["usr_voornaam"];
            }
        }

        return $login_success;

        //terugkeren naar afzender als er een fout is
//        if ( count($_SESSION['errors']) > 0 )
//        {
//            $_SESSION['OLD_POST'] = $_POST;
//            header( "Location: " . $sending_form_uri );
//            exit();
//        }

        //make key-value string part of SQL statement
//        $keys_values = [];

        //output if not redirected
//        print $sql ;
//        print "<br>";
//        print $result->rowCount() . " records affected";

        //redirect after insert or update
//        if ( $insert AND $_POST["afterinsert"] > "" ) header("Location: ../" . $_POST["afterinsert"] );
//        if ( $update AND $_POST["afterupdate"] > "" ) header("Location: ../" . $_POST["afterupdate"] );
    }
}