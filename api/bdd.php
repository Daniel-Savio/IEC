<?php

include("Files.php");

if (isset($_FILES["xml"]) ){
    $xml = $_FILES["xml"];
    echo "Chegou um XML";
    var_dump($xml);

    $novoNome  = $_FILES['xml']['name'];
    $diretorio = '../ext/';
    $path = '../ext/'.$novoNome;
    
    $File = new Files();
    $File->setXml($novoNome, $path);
    

    move_uploaded_file($_FILES['xml']['tmp_name'], $diretorio . $novoNome); //salva no diretorio ext/
   

}

if (isset($_FILES["csv"]) ){
    $csv = $_FILES["csv"];
    echo "Chegou um CSV";
    var_dump($csv);
    $File = new Files();

    $novoNome  = $_FILES['csv']['name'];
    $diretorio = '../ext/';
    $path = '../ext/'.$novoNome;

    move_uploaded_file($_FILES['csv']['tmp_name'], $diretorio . $novoNome); //salva no diretorio ext/
    $File->setCsv($novoNome, $path);
}