<?php

use Base\Libri as BaseLibri;

/**
 * Skeleton subclass for representing a row from the 'libri' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Libri extends BaseLibri
{
    public function getDescriptor()
    {
        return $this->getTitolo();
    }
    public static function fromPost(Libri &$element)
    {

        $element->setTitolo($_POST["titolo"]);
        $element->setAutore1($_POST["autore1"]);
        $element->setAutore2($_POST["autore2"]);
        $element->setAutore3($_POST["autore3"]);
        $element->setTipo1($_POST["tipo1"]);
        $element->setIdgenere1($_POST["IDgenere1"]);
        $element->setTipo2($_POST["tipo2"]);
        $element->setIdgenere2($_POST["IDgenere2"]);
        $element->setTipo3($_POST["tipo3"]);
        $element->setIdgenere3($_POST["IDgenere3"]);
        $element->setEditore($_POST["editore"]);
        $element->setDatiTecnici($_POST["dati_tecnici"]);
        $element->setDirittiControllati($_POST["diritti_controllati"]);
        $element->setDirittiConcessi($_POST["diritti_concessi"]);
        $element->setDescrizioneBreve($_POST["descrizione_breve"]);
        $element->setDescrizione($_POST["descrizione"]);
        $element->setPdf1Ita($_POST["pdf1_ita"]);
        $element->setPdf1Eng($_POST["pdf1_eng"]);
        $element->setPdf1Deu($_POST["pdf1_deu"]);
        $element->setPdf1Fra($_POST["pdf1_fra"]);
        $element->setPdf1Esp($_POST["pdf1_esp"]);
        $element->setPdf2($_POST["pdf2"]);
        $element->setPdf3($_POST["pdf3"]);
        $element->setPdf4($_POST["pdf4"]);
        $element->setImgSmall($_POST["img_small"]);
        $element->setImgBig($_POST["img_big"]);
        $element->setVetrina($_POST["vetrina"]);
        $element->setOrdine($_POST["ordine"]);
        $element->setVetrinacat($_POST["vetrinacat"]);
        $element->setOrdinecat($_POST["ordinecat"]);
    }
}
