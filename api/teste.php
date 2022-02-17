<?php
include("xml.php");
include("csv.php");

$xml = new xml();
$csv = new csv("../ext/TM-CSV.csv");
$xml->toEletronorte("../ext/TM.xml", $csv->getData(), "TM");