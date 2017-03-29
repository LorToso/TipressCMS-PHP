<?php

use Base\Clienti as BaseClienti;

/**
 * Skeleton subclass for representing a row from the 'clienti' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Clienti extends BaseClienti
{

    public static function getPathFor($filetype)
    {
        $filetype = strtolower($filetype);
        if($filetype == 'image')
        {
            return '../tipress/img/clienti/';
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
    public static function fromPost(Clienti &$element)
    {
        $element->setNome($_POST["nome"]);
        $element->setCognome($_POST["cognome"]);
        $element->setSito($_POST["sito"]);
        $element->setDescrizione($_POST["descrizione"]);
        $element->setImgBig($_POST["img_big"]);
    }
}
