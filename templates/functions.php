<?php

//functie om php data in array te steken
function GetData($sql_query) {
    global $conn_steden;
    return $conn_steden -> query($sql_query);
}

?>