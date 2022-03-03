<?php

/**
 * Classe que lida com a coleta de dados do arquivo xml.
 * @author     Daniel Sávio
 * @version    1.0

 */
class XML
{


    /**
     *
     * Convert a xml file to an array
     * @return   array retorna todos os dados DOI->DAI->Val do xml covertido em array junto com os atributos inst, lnClass e name.
     *
     */
    public function getData($url)
    {
        $xml = simplexml_load_file($url);
        $data = [];
        $class = $xml->{'IED'}->{'AccessPoint'}->{'Server'}->{'LDevice'};
        $row = 0;
        foreach ($class as $class) {
            $class1 = $class->{'LN'};
            foreach ($class1 as $class1) {

                $doi = $class1->{'DOI'};
                foreach ($doi as $value) {
                    $data[$row][0] = $class["desc"];
                    $data[$row][1] = $class1["lnClass"];
                    $data[$row][2] = $class1["inst"];
                    $data[$row][3] = $value["name"];
                    $data[$row][4] = $value->{'DAI'}->{'Val'};
                    //$data[$row][5] = $data[$row][1] . $data[$row][2] . $data[$row][3];
                    $row++;
                }
            }
        }

        return $data;
    }

    public function toEletronorte($url ,$csv, $name)
    {
        $xml = simplexml_load_file($url);
        $data = [];
        $class = $xml->{'IED'}->{'AccessPoint'}->{'Server'}->{'LDevice'};
        $row = 0;

        foreach ($class as $class) {
            $class1 = $class->{'LN'};
            foreach ($class1 as $class1) {
                $doi = $class1->{'DOI'};
                foreach ($doi as $value) {
                    $data[$row][0] = $class["desc"];
                    $data[$row][1] = $class1["lnClass"];
                    $data[$row][2] = $class1["inst"];
                    $data[$row][3] = $value["name"];
                    $data[$row][4] = $value->{'DAI'}->{'Val'};
                    $data[$row][5] = $data[$row][1] . $data[$row][2] . $data[$row][3];

                    for ($i = 3; $i < count($csv); $i++) {
                        for ($j = 0; $j <=4 ; $j++) {
                            $idCSV = $csv[$i][0] . $csv[$i][1] . $csv[$i][2];
                            if ($idCSV ==  $data[$row][5]) {
                                $value->{'DAI'}->{'Val'} = $csv[$i][4];
                                $xml->asXML("../ext/{$name}");
                            }
                        }
                        
                    }
                }
                $row++;
            }
        }
    }
}
