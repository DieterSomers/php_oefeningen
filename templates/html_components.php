<?php

//functie om header toe te voegen
function PrintHead(){
    echo file_get_contents("../templates/head.html");
}

//functie jumbotron toe te voegen
function PrintJumbo($type){
    if ($type == "detail") {
        echo file_get_contents("../templates/jumbo_detail.html");
    }
    else {
        echo file_get_contents("../templates/jumbo.html");
    }
}

?>