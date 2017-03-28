<?php

use Base\Autori as BaseAutori;

/**
 * Skeleton subclass for representing a row from the 'autori' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Autori extends BaseAutori
{
    public static function getPathFor($filetype)
    {
        $filetype = strtolower($filetype);
        if($filetype == 'image')
        {
            return '../tipress/img/autori/';
        }
        else if($filetype == 'document')
        {
            return '../tipress/pdf/';
        }
        else
        {
            die("error: invalid filetype");
        }
    }
    public static function getDefaultImagePath()
    {
        return 'img/default_author.jpg';
    }
    public function getDescriptor()
    {
        return $this->getNome() . " " . $this->getCognome();
    }
    public static function fromPost(Autori &$element)
    {
        $element->setNome($_POST["nome"]);
        $element->setCognome($_POST["cognome"]);
        $element->setSito($_POST["sito"]);
        $element->setRiconoscimenti($_POST["riconoscimenti"]);
        $element->setBiografiaBreve($_POST["biografia_breve"]);
        $element->setBiografia($_POST["biografia"]);
        $element->setImgBig($_POST["img_big"]);
    }
}
