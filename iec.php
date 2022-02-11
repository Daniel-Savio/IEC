<?php

require "csv.php";
require "xml.php";

//$csv = new CSV("./ext/aux.csv");
//$xml = new XML("./ext/tm.xml");
$sdv = new XML("./ext/SDV.xml");


//$array = $csv->getData();
//$xmlArray = $xml->getData();
$sdvArray = $sdv->getData();
//var_dump($xmlArray);

?>

<!DOCTYPE html>
<html lang="pt">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/style.css">
        <title>IEC</title>
    </head>

    <body style="text-align: center; width: 5000px;">

        <div id="xml" class="tabela" style="display: inline-block;">
            <h2>Dados do XML</h2>
            <table>
                <thead style="color:aliceblue; background-color: #008242;">
                    <tr>
                        <th>
                            LN
                        </th>
                        <th style="padding: 0 10px;">
                            Inst
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Descrição
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($sdvArray as $data) {
                        echo "<tr class='row'>";
                        foreach ($data as $col) {
                            echo "<td>" . $col . "</td>";
                        }
                        echo "</tr>";
                    }
                    ?>

                </tbody>
            </table>

        </div>

        <!-- <div id="xml-eletronorte" class="tabela" style="display: inline-block;">
            <h2>Dados do XML-Eletronorte</h2>
            <table>
                <thead style="color:aliceblue; background-color: #008242;">
                    <tr>
                        <th>
                            LN
                        </th>
                        <th style="padding: 0 10px;">
                            Inst
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Descrição
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $xml->toEletronorte($csv->getData());
                    $xmlEletronort = new XML("./tm-eletronorte.xml");
                    foreach ($xmlEletronort->getData() as $data) {
                        echo "<tr class='row-eletro'>";
                        foreach ($data as $col) {
                            echo "<td>" . $col . "</td>";
                        }
                        echo "</tr>";
                    }
                    ?>

                </tbody>
            </table>

        </div> -->

         <!-- <div id="csv" style="display: inline-block; margin-left: 100px;">
            <h2>Dados do CSV</h2>
            <table>
                <thead style="color:aliceblue; background-color: #008242;">
                    <tr>
                        <th>
                            LN
                        </th>
                        <th style="padding: 0 10px;">
                            Inst
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Descrição IEC
                        </th>
                        <th>
                            Descrição Final
                        </th>
                        <th>
                            Link
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($array as $data) {
                        echo "<tr style='margin: 5px 0'>";
                        foreach ($data as $col) {
                            echo "<td>" . $col . "</td>";
                        }
                        echo "</tr>";
                    }
                    ?>

                </tbody>
            </table>

        </div>  -->




    </body>

    <!-- <script>
        let description = document.querySelectorAll('.row  td:nth-child(4)');
        let descriptionEletro = document.querySelectorAll('.row-eletro  td:nth-child(4)');
        description.forEach((desc) => {
            descriptionEletro.forEach((descEletro) => {
                if (desc.innerHTML === descEletro.innerHTML && descEletro.innerHTML !== "Treetech Tecnologia") {
                    descEletro.classList.add("copia");
                    
                }
            })
        })
    </script>  -->

</html>