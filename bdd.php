<?php

if (isset($_FILES["xml"]) ){
    $xml = $_FILES["xml"];
    echo "Chegou um XML";
    echo $xml['name'];
    var_dump($xml);

    $novoNome  = $_FILES['name'] . ".xml";
    $diretorio = 'ext/';
    move_uploaded_file($_FILES['xml']['tmp_name'], $diretorio . $novoNome); //salva no diretorio img/feed
}

if (isset($_POST["csv"]) ){
    $csv = $_POST["csv"];
    echo "Chegou um CSV";
    var_dump($csv);
}

