<?php
/**
* Classe que lida com a coleta de dados do arquivo csv que será inserido no arquivo .icd gerado do arquivo xml.
* @author     Daniel Sávio
* @version    1.0

*/

class CSV {

    private $url;
    private $csv;

    /**
     * Cria um objeto do tipo CSV para manipular
     * @param string O caminho da url do arquivo .csv que se deseja pegar os valores
     *
     */
    function __construct(string $url)
    {
        $this->url = $url;
        try
        {
           $this->csv = fopen($this->url, "r");
        
        }
        catch( Exception $e)
        {
            echo('deu ruim');
            echo $e;
        }
    }

    /**
     *
     * Convert a csv file to array
     * @return array retorna todos os dados do csv covertido em uma matriz, linha e coluna. Esse array começa na posição 2
     *
     */
    public function getData()
    {
        $row = 1;
        $data = [];
        while(($value = fgetcsv($this->csv, 1000, ";")) !== FALSE){
            $columns = count($value);
            $row++;
            for($c=0; $c < $columns; $c++){
                if($value[$c] !== ""){
                    $data[$row][$c]= $value[$c];
                }
                
            }
        }
        return $data;
    }

    
}


?>