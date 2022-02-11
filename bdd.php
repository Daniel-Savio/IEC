<?php

if (isset($_POST["xml"]) ){
    $xml = $_POST["xml"];
    echo "Chegou um XML";
    echo $xml["name"];
    var_dump($xml);
}

if (isset($_POST["csv"]) ){
    $csv = $_POST["csv"];
    echo "Chegou um CSV";
    var_dump($csv);
}

