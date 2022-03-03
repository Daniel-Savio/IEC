<?php
include("xml.php");
include("csv.php");

$xml = new xml();
$csv = new csv("../ext/Aux-tm.csv");
// var_dump($csv->getData());
$xml->toEletronorte("../ext/tm.xml", $csv->getData(), "TM.xml");