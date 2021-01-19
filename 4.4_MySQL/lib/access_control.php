<?php

if (!$public_access){
    if(!key_exists('user', $_SESSION) || $_SESSION['user'] == null){
        header("Location: no_access.php");
    }
}

?>
