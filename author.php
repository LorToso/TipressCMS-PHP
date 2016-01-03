<?php
require_once 'Entity.php';

class Author implements Entity
{
    public $values = [];
    
    public static function fromDBResult(DBResult $dbResult)
    {
        return new Author($dbResult->values);
    }
    public static function fromStrings($id, $cognome = null, $nome = null, $riconoscimenti = null, $biografia_breve = null, $biografia = null, $img_small = null,$img_big = null,$sito = null)
    {
        $array = [];
        $array[0] = $id;
        $array[1] = $nome;
        $array[2] = $cognome;
        $array[3] = $riconoscimenti;
        $array[4] = $biografia_breve;
        $array[5] = $biografia;
        $array[6] = $img_small;
        $array[7] = $img_big;
        $array[8] = $sito;
        
        return new Author($array);
    }
    private function __construct($array) {
        $this->values['id']             = $array[0];
        $this->values['nome']           = $array[1];
        $this->values['cognome']        = $array[2];
        $this->values['riconoscimenti'] = $array[3];
        $this->values['biografia_breve']= $array[4];
        $this->values['biografia']      = $array[5];
        $this->values['img_small']      = $array[6];
        $this->values['img_big']        = $array[7];
        $this->values['sito']           = $array[8];
    }

    public function GetDescriptor()
    {
        return $this->values['nome'] . ' ' . $this->values['cognome'];
    }

    public function compare($other) {
        
    }

}
