<?php
include "xml.php";
$xml = new XML();
if(isset($_POST)){
    //var_dump($_POST['name']);
    $url = "../ext/".$_POST['name'];
    print_r($url);
    $data_object = json_decode($_POST['info'], true);
    $data = $data_object['arr'];

    $arrayCerto = array(array());
    $row=0;
    
    //transformando o arrya unico em uma matriz
    for ($cell=0; $cell < count($data); $cell++) { 
        
        $column = $cell%5;
        $arrayCerto[$row][$column] = $data[$cell];
        
        if($column == 4){
            $row++;
        }
    }

    //vendo o array novo
    for ($i=0; $i < count($arrayCerto); $i++) { 
        echo '</br>';
       for ($j=0; $j < count($arrayCerto[$i]); $j++) { 
           echo $arrayCerto[$i][$j]." / ";
       }
    }

    $xml->save($url, $arrayCerto, $_POST['name']);

}