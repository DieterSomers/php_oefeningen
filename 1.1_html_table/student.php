<?php

$student =	array(
    "voornaam" =>  "Jan",
    "naam" =>  "Janssens",
    "straat" =>  "Oude baan",
    "huisnr" =>  "22",
    "postcode" =>  2800,
    "gemeente" =>  "Mechelen",
    "geboortedatum" =>  "14/05/1991",
    "telefoon" =>  "015 24 24 26",
    "e-mail" =>  "jan.janssens@gmail.com"
);

StudentToTable($student);

function StudentToTable($student) {
    $output = "<h1>Student</h1>";

    $output .= "<table>";
    foreach ($student as $key => $value){
        $key = ucfirst($key);
        $output .= "<tr><td>$key</td><td>$value</td></tr>";
    }
    $output .= "</table>";

    print $output;
}
