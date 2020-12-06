<?php

function PrintHead()
{
    $head = file_get_contents("templates/head.html");
    print $head;
}

function PrintJumbo($type = null){
    if ($type == "detail") {
        $jumbo = file_get_contents("templates/jumbo_detail.html");
        print $jumbo;
    }
    else {
        $jumbo = file_get_contents("templates/jumbo.html");
        print $jumbo;
    }
}

function MergeViewWithData( $template, $data )
{
    $returnvalue = "";

    foreach ( $data as $row )
    {
        $output = $template;

        foreach( array_keys($row) as $field )
        {
            $output = str_replace( "@$field@", $row["$field"], $output );
        }

        $returnvalue .= $output;
    }

    return $returnvalue;
}