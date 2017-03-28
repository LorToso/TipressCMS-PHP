<?php 
require_once('FormMethods.php');

class AutoriForm
{
    public static function printModificationForm(Autori $element){
        echo '<form method="post">';
        AutoriForm::printForm($element);
        printFormButtons($element);
        echo '</form>';
    }

    private static function printForm(Autori $element){
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
                printSimpleRow("Nome:","nome",$element->getNome());
                printSimpleRow("Cognome:","cognome",$element->getCognome());
                printSimpleRow("Sito:","sito",$element->getSito());
                ?>
            </table>
        </td>
        <td>
            <?php
            printImageBox('img_big',$element->getImgBig(), 'Autori');//'../tipress/img/autori/');
            ?>
        </td>
    </tr>
    <tr><td><br></td></tr>
    <?php
    printHTMLRow("Riconoscimenti","riconoscimenti",$element->getRiconoscimenti());
    printHTMLRow("Biografia breve","biografia_breve",$element->getBiografiaBreve());
    printHTMLRow("Biografia","biografia",$element->getBiografia());
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