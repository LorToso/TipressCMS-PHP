<?php
require('FormMethods.php');

class LibriForm
{
    public static function printModificationForm(Libri $element){
        echo '<form method="post">';

        LibriForm ::printForm($element);

        echo '<div id="formbuttonbox">';

        if($element->isNew())
        {
            echo '<button type="submit" name="action" value="insert" id="createbutton">Crea!</button>';
        }
        else
        {
            echo '<button type="submit" name="action" value="update" id="changebutton">Modifica!</button>';
            echo '<button type="submit" name="action" value="delete" id="deletebutton">Elimina!</button>';
        }
        echo '</div>';
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
                printFKBox("Autore1","autore1",$element->getAutore1(),"autori","nome + ' ' + cognome","cognome");
                printFKBox("Autore2","autore2",$element->getAutore2(),"autori","nome + ' ' + cognome","cognome");
                printFKBox("Autore3","autore3",$element->getAutore3(),"autori","nome + ' ' + cognome","cognome");
                printSimpleRow("Tipo 1:","tipo1",$element->getTipo1());
                printSimpleRow("IDgenere 1:","IDgenere1",$element->getIdgenere1());
                printSimpleRow("Tipo 2:","tipo2",$element->getTipo2());
                printSimpleRow("IDgenere 2:","IDgenere2",$element->getIdgenere2());
                printSimpleRow("Tipo 3:","tipo3",$element->getTipo3());
                printSimpleRow("IDgenere 3:","IDgenere3",$element->getIdgenere3());
                printSimpleRow("Editore:","editore",$element->getEditore());

                ?>
            </table>
        </td>
        <td>
            <?php
            printImageBox($element->getImgBig(), '../tipress/img/libri/');
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
    printFileBox("PDF italiano:", "pdf1_ita",$element->getPdf1Ita(), 'Libri');
    printFileBox("PDF inglese:", "pdf1_eng",$element->getPdf1Eng(), 'Libri');
    printFileBox("PDF tedesco:", "pdf1_deu",$element->getPdf1Deu(), 'Libri');
    printFileBox("PDF francese:", "pdf1_fra",$element->getPdf1Fra(), 'Libri');
    printFileBox("PDF spagnolo:", "pdf1_esp",$element->getPdf1Esp(), 'Libri');
    printFileBox("Altro PDF 1:", "pdf2",$element->getPdf2(), 'Libri');
    printFileBox("Altro PDF 2:", "pdf3",$element->getPdf3(), 'Libri');
    printFileBox("Altro PDF 3:", "pdf4",$element->getPdf4(), 'Libri');
    printCheckbox("Vetrina?", "vetrina", $element->getVetrina());
    printOrderbox("Ordine:", "ordine", $element->getOrdine());
    printCheckbox("Vetrina di categoria?", "vetrinacat", $element->getVetrinacat());
    printOrderbox("Ordine in categoria:", "ordinecat", $element->getOrdinecat());
    ?>
</table>
<?php
    }
}
function getCurrentURL()
{
    return filter_input(INPUT_SERVER, 'REQUEST_URI');
}
function getUrlWithoutGetParams(){
    return substr(getCurrentURL(),0,strpos(getCurrentURL(),'?'));
}