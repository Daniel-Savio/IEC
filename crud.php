<?php
include("./api/Files.php");
$file = new Files();

if(isset($_GET['id_del'])){
    $file->deleteXml($_GET['id_del']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/listagem.css">
    <link rel="stylesheet" type="text/css" href="./css/modal.css">
    <link rel="stylesheet" href="./css/crud.css">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    


    <title>CRUD</title>
</head>

<body>
    <header>
        <img class="logo" src="./assets/logoStd.png" width="100px">
        <nav>
            <ul class="nav_link ">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a href="./listagem.php">Listagem</a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <table class="table">
            <thead class="table-dark">
                <td>Data</td>
                <td>Nome do arquivo</td>
                <td>Ação</td>
            </thead>
            <tbody>
            <?php
                 
                    foreach ($file->fetchXml() as  $xml) {
                        echo
                        "
                        <tr class='table-line'>
                            <td>
                                {$xml['created_at']}
                            </td>
                            <td>
                                {$xml['xml_file_name']}
                            </td>
                            <td class='action'>
                                <a class='del' href='crud.php?id_del={$xml['id']}';>Excluir</a>
                            </td>
                        </tr>
                        ";
                        
                    }
                   

                    ?>
            </tbody>
        </table>
    </main>

</body>

</html>
<script src="./js/geral.js"></script>
