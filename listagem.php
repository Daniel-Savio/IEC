<?php 
include ("./api/Files.php");
$file = new Files();

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/listagem.css">



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
                    <a href="./iec.php">Listagem</a>
                </li>
            </ul>
        </nav>
        <a href="#" class="cta"><button>Botão</button></a>
    </header>


    <main id="file-list">
        <section class="asside">
            <?php 
                foreach ($file->fetchXml() as  $xml) {
                    echo  "<span class='xml-item'>". $xml['xml_file_name']. "</span>";
                }

            ?>
        </section>
        <section class="visual">
            coisas aparecendo
        </section>

    </main>




    <footer>

        <div class="footer_body">
            <h3>Treetech</h3>
            <p>
                Rua José Alvim, 112 | Atibaia–SP | 12940–750
            </p>
            <p>
                Copyright © 2022 by Treetech
            </p>
        </div>


    </footer>
</body>

<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            content.classList.toggle("active_content");
        });
    }
</script>
<script src="./js/listagem.js"></script>

</html>