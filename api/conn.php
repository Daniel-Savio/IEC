<?php

abstract class  Conn{
   
    #conexão com o BD POR FAVOR, NÃO ALTERE OS DADOS DE CONEXÃO
    protected function connDb()
    {
        $host = "localhost";
        $user = 'root';
        $password = '';
        $database = 'iec';
        try {
           $conn = new mysqli($host, $user, $password, $database);
           return $conn;
           
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}