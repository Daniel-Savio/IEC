<?php

/**
* Classe que lida com a coleta de dados do arquivo xml.
* @author     Daniel Sávio
* @version    1.0

*/

class XML extends Conn{

    private $url;
    private $xml;

    /**
     * Cria um objeto do tipo XML para manipular
     * @param string O caminho da url do arquivo .xml que se deseja pegar os valores
     *
     */
    public function __construct($url) {
        $this->url = $url;

        try 
        {
            $this->xml = simplexml_load_file($this->url);
           
        } catch (Exception $e) {
            echo "Erro no xml";
        }
    }

/**
 *
 * Convert a xml file to an array
 * @return   array retorna todos os dados DOI->DAI->Val do xml covertido em array junto com os atributos inst, lnClass e name.
 *
 */
    public function getData()
    {
        $data = [];
        $class = $this->xml->{'IED'}->{'AccessPoint'}->{'Server'}->{'LDevice'};
        $row=0;
        foreach($class as $class){
            $class1 = $class->{'LN'};
            foreach ($class1 as $class1) {
           
                $doi = $class1->{'DOI'};
                foreach ($doi as $value) {
                   
                    $data[$row][0] = $class1["lnClass"];
                    $data[$row][1] = $class1["inst"];
                    $data[$row][2] = $value["name"];
                    $data[$row][3] = $value->{'DAI'}->{'Val'};
                    //$data[$row][4] = $data[$row][0] . $data[$row][1] . $data[$row][2];
                    $row++;
    
                }
            }
        }
        
        return $data;
    }

    public function toEletronorte($csv)
    { 
        $data = [];
        $class = $this->xml->{'IED'}->{'AccessPoint'}->{'Server'}->{'LDevice'}->{'LN'};
        $row=0;

        foreach ($class as $class) {
           
            $doi = $class->{'DOI'};
            foreach ($doi as $value) {
               
                $data[$row][0] = $class["lnClass"];
                $data[$row][1] = $class["inst"];
                $data[$row][2] = $value["name"];
                $data[$row][3] = $value->{'DAI'}->{'Val'};
                $data[$row][4] = $data[$row][0] . $data[$row][1] . $data[$row][2]; //id
                
                for($i = 2; $i < count($csv); $i++ ){
                    for($j = 0; $j < 3; $j++ ){
                        $idCSV = $csv[$i][0] . $csv[$i][1] . $csv[$i][2];
                        
                        if($idCSV ==  $data[$row][4]){
                            $value->{'DAI'}->{'Val'} = $csv[$i][4];
                            $this->xml->asXML("tm-eletronorte.xml");
                           
                        }
                        
                    }

                }
                $row++;

            }
            
        }
        
    }

}