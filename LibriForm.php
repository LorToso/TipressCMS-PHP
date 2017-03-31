<?php
require('FormMethods.php');

class LibriForm
{
    public static function printModificationForm(Libri $element){
        echo '<form method="post">';

        LibriForm ::printForm($element);
        printFormButtons($element);

        echo '</form>';
    }
    private static function printForm(Libri $element){
        ?>
<table>
    <tr>
        <td>
            <table>

                <?php
                if($element->getId() != '') {
                    printSimpleRow("ID:","id",$element->getId());
                    disableID();
                }
                printSimpleRow("Titolo","titolo",$element->getTitolo());
                printFKBox("Autore1","autore1",$element->getAutore1(),"Autori");
                printFKBox("Autore2","autore2",$element->getAutore2(),"Autori");
                //printFKBox("Autore3","autore3",$element->getAutore3(),"Autori");
                //printSimpleRow("Tipo 1:","tipo1",$element->getTipo1());
                printFKBox("Genere:","tipo1",$element->getTipo1(),"Genere1");
                printFKBox("Tipo:","IDgenere1",$element->getIdgenere1(),"Genere2");
                //printSimpleRow("Tipo 2:","tipo2",$element->getTipo2());
                //printSimpleRow("IDgenere 2:","IDgenere2",$element->getIdgenere2());
                //printSimpleRow("Tipo 3:","tipo3",$element->getTipo3());
                //printSimpleRow("IDgenere 3:","IDgenere3",$element->getIdgenere3());
                printSimpleRow("Editore:","editore",$element->getEditore());

                ?>
            </table>
        </td>
        <td>
            <?php
            printImageBox('img_big',$element->getImgBig(), 'Libri');
            ?>
        </td>
    </tr>
    <tr><td><br></td></tr>
    <?php
    printHTMLRow("Dati tecnici:","dati_tecnici", $element->getDatiTecnici());
    printHTMLRow("Diritti controllati:","diritti_controllati", $element->getDirittiControllati());
    printHTMLRow("Diritti concessi:","diritti_concessi", $element->getDirittiConcessi());
    printHTMLRow("Descrizione breve:","descrizione_breve", $element->getDescrizioneBreve());
    printHTMLRow("Descrizione:","descrizione", $element->getDescrizione());
    printFileBox("Scheda italiano:", "pdf1_ita",$element->getPdf1Ita(), 'Libri');
    printFileBox("Scheda inglese:", "pdf1_eng",$element->getPdf1Eng(), 'Libri');
    printFileBox("Scheda tedesca:", "pdf1_deu",$element->getPdf1Deu(), 'Libri');
    printFileBox("Scheda francese:", "pdf1_fra",$element->getPdf1Fra(), 'Libri');
    printFileBox("Scheda spagnolo:", "pdf1_esp",$element->getPdf1Esp(), 'Libri');
    printFileBox("Comunicato Stampa:", "pdf2",$element->getPdf2(), 'Libri');
    printFileBox("Estratto del libro:", "pdf3",$element->getPdf3(), 'Libri');
    printFileBox("Libro intero:", "pdf4",$element->getPdf4(), 'Libri');
    printCheckbox("Vetrina?", "vetrina", $element->getVetrina(),array(true => "si", false => "no"));
    //printOrderbox("Ordine:", "ordine", $element->getOrdine());
    printCheckbox("Vetrina di categoria?", "vetrinacat", $element->getVetrinacat(),array(true => "si", false => "no"));
    //printOrderbox("Ordine in categoria:", "ordinecat", $element->getOrdinecat());
    ?>
</table>
<?php
    }
}