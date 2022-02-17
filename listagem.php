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
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
   



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
                            " </p>".
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

    <!-- <footer>

        <div class="footer_body">
            <h3>Treetech</h3>
            <p>
                Rua José Alvim, 112 | Atibaia–SP | 12940–750
            </p>
            <p>
                Copyright © 2022 by Treetech
            </p>
        </div>


    </footer> -->
</body>

<script src="./js/listagem.js"></script>
<script src="./js/geral.js"></script>
<script>

</script>
</html>