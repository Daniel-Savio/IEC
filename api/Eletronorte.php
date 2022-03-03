<?php
include("Files.php");
include("xml.php");
include("csv.php");

if(isset($_POST['csv']) && isset($_POST['xml']) )
{
    $csvPath = "." . $_POST['csv'];
    $xmlPath = "." . $_POST['xml'];

    $rest = substr($xmlPath, 7, -4);  // retorna o nome do meu arquivo a partir do caminho
    $newName = $rest . "-eletronorte.xml";

    echo $csvPath;
    echo $xmlPath;

    $csv = new CSV($csvPath);
    $xml = new XML();
    $file = new Files();

    //var_dump($csv->getData());


    $file->setXml($newName, "./ext/{$newName}");
    $xml->toEletronorte($xmlPath, $csv->getData(), $newName);
    header("Location: http://localhost/IEC/listagem.php");

}