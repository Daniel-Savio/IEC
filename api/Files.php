<?php

include("Conn.php");

class Files extends Conn{

    public function setXml($name, $path)
    {
        $date = date('Y-m-d H:i:s');
        $sql = "INSERT INTO `xmlfiles` values
        (NULL,
        '{$date}',
        '{$name}', 
        '{$path}',
         NULL 
         );";

        echo $sql;

        $this->connDb()->query($sql);
    }
    public function fetchXml()
    {
        $fetchXml =  $this->connDb()->query("select * from xmlfiles;");

        $xmlJson = [];
        $i = 0;

        while($fetch=$fetchXml->fetch_assoc()){
            $xmlJson[$i] = 
            [
                "id" =>$fetch['id'],
                "created_at" => $fetch['created_at'],
                "xml_file_name" => $fetch['xml_file_name'],
                "xml_file_path" => $fetch['xml_file_path'],
                "csv_id" => $fetch['csv_id']
            ];
            $i++;
        }
        header("Access-Control-Allow-Origin: *");
       // header("Access-Control-Allow-Credentials : true ");
        header("Content-Type: application/json");
        http_response_code(200);
        $xmlJson1 = json_encode($xmlJson);
        echo $xmlJson1;
        return $xmlJson1;


    }
    public function setCsv($name, $path)
    {
        $date = date('Y-m-d H:i:s');
        $sql = "INSERT INTO `csvfiles` values
        (NULL,
        '{$date}',
        '{$name}', 
        '{$path}'
         );";

        echo $sql;

        $this->connDb()->query($sql);
    }

    public function fetchCsv()
    {
        $fetchCsv =  $this->connDb()->query("select * from csvfiles;");

        $csvJson = [];
        $i = 0;

        while($fetch=$fetchCsv->fetch_assoc()){
            $csvJson[$i] = 
            [
                "id" =>$fetch['id'],
                "created_at" => $fetch['created_at'],
                "csv_file_name" => $fetch['csv_file_name'],
                "csv_file_path" => $fetch['csv_file_path']
            ];
            $i++;
        }

        return $csvJson;
    }

}