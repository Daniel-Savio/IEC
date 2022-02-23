<?php
include("./api/xml.php");
include("./api/Files.php");
$file = new Files();


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/listagem.css">
    <link rel="stylesheet" type="text/css" href="./css/modal.css">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">




    <title>Listagem de arquivos</title>
</head>

<body>

    <header>
        <img class="logo" src="./assets/logoStd.png" width="100px">
        <nav>
            <ul class="nav_link ">
                <li>
                    <a href="./index.html">Home</a>
                </li>
                <li>
                    <a href="./listagem.php">Listagem</a>
                </li>
            </ul>
        </nav>
        <a href="#" class="cta"><button>Botão</button></a>
    </header>

    <div class="modal modal-active">
        <div class="modal-container">
            <div class="modal-header">
                <h3>Converter XML para padrão Eletro-Norte</h3>
                <span id="close" class="material-icons md-24">
                    close
                </span>
            </div>

            <form class="modal-body">
                <div class="select-area">
                    <div class="list-group">
                    <div class="csv-list">
                        <?php   
                            $csvList = $file->fetchCsv();
                            foreach ($csvList as $csv) {
                                echo "<span class='csv-list-item'>{$csv['csv_file_name']}</span>";
                            }
                        ?>
                    </div>
                    <div class="xml-list">
                    </div>
                    
                        <?php 
                         foreach ($file->fetchXml() as  $xml) {
                            echo
                            "<span class='xml-list-item'>" .
                                $xml['xml_file_name'] .
                                "<p style='display:none'> "
                                . $xml["id"] .
                                " </p>" .
                                "</span>";
                        }
                        ?>
                    </div>
                </div>

                <button class="btn">Converter</button>
            </form>

        </div>
    </div>


    <main id="file-list">
        <aside class="asside">


            <div class="asside-body">
                <h3>Lista de XML</h3>

                <div class="span-list">
                    <?php
                    foreach ($file->fetchXml() as  $xml) {
                        echo
                        "<span class='xml-item'>" .
                            $xml['xml_file_name'] .
                            "<strong> " .
                            $xml["created_at"] .
                            " </strong>" .
                            "<p style='display:none'> "
                            . $xml["id"] .
                            " </p>" .
                            "</span>";
                    }

                    ?>
                    <div class="btn" id="visualizar"> To eletronorte ></div>
                </div>
            </div>

            <div class="collapse-btn">
                <span class="material-icons md-24" id="arrow">chevron_left</span>
            </div>

        </aside>

        <section class="visual">

            <!-- <div class="warning">
                <p>Nenhum arquivo selecionado para vizualização</p>
            </div> -->

            <?php
            foreach ($file->fetchXml() as  $data) {
                $xml = new XML($data['xml_file_path']);
                $xmlContent = $xml->getData($data['xml_file_path']);
                echo "
                    <table class='xml-table' id='{$data['xml_file_name']}'>
                    <thead>
                        <tr>
                            <th class='table-name'>{$data['xml_file_name']}</th>
                        </tr>
                        <tr>
                            <th class='table-ln'>
                                <div>LDevice</div>   
                            </th>
                            <th class='table-ln'>
                                <div>LN</div>   
                            </th>
                            <th>
                                <div>Inst</div> 
                            </th>
                            <th>
                                <div>DataName</div> 
                            </th>
                            <th class='table-desc'>
                                <div>Descrição</div> 
                            </th>
                        </tr>
                    </thead>";
                foreach ($xmlContent as $data) {
                    echo "<tr class='row'>";
                    foreach ($data as $col) {
                        echo "<td>" . $col . "</td>";
                    }
                    echo "</tr>";
                }
            }
            ?>

        </section>


    </main>

</body>

<script src="./js/listagem.js"></script>
<script src="./js/geral.js"></script>
<script src="./js/toEletronorte.js"></script>
<script>

</script>

</html>