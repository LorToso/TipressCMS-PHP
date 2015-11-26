<?php

/**
 * author short summary.
 *
 * author description.
 *
 * @version 1.0
 * @author tk4990
 */
class author
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

    function __construct($id, $nome = null, $cognome = null, $riconoscimenti = null, $biografia_breve = null, $biografia = null, $img_small = null,$img_big = null,$sito = null) {
        $this->id = $id;
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->riconoscimenti = $riconoscimenti;
        $this->biografia_breve = $biografia_breve;
        $this->biografia = $biografia;
        $this->img_small = $img_small;
        $this->img_big = $img_big;
        $this->sito = $sito;
    }

    public function GetDescriptor()
    {
        return $this->nome . ' ' . $this->cognome;
    }

}
