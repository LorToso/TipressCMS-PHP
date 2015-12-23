<?php
require_once 'Entity.php';

class author implements Entity
{
    public $id;
    public $cognome;
    public $nome;
    public $riconoscimenti;
    public $biografia_breve;
    public $biografia;
    public $img_small;
    public $img_big;
    public $sito;

    public $idChanged = false;
    public $cognomeChanged = false;
    public $nomeChanged = false;
    public $riconoscimentiChanged = false;
    public $biografia_breveChanged = false;
    public $biografiaChanged = false;
    public $img_smallChanged = false;
    public $img_bigChanged = false;
    public $sitoChanged = false;
    
    
    public static function fromDBResult(DBResult $dbResult)
    {
        return new author($dbResult->values);
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
        
        return new author($array);
    }
    private function __construct($array) {
        $this->id               = $array[0];
        $this->nome             = $array[1];
        $this->cognome          = $array[2];
        $this->riconoscimenti   = $array[3];
        $this->biografia_breve  = $array[4];
        $this->biografia        = $array[5];
        $this->img_small        = $array[6];
        $this->img_big          = $array[7];
        $this->sito             = $array[8];
    }

    public function GetDescriptor()
    {
        return $this->nome . ' ' . $this->cognome;
    }

}
