<?php 
require('FormMethods.php');

class AutoriForm
{
    public static function printModificationForm(Autori $element){
        echo '<form method="post">';

        AutoriForm::printForm($element);

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

    private static function printForm(Autori $element){
        ?>
<table>
    <tr>
        <td>
            <table>
                <?php
                if($element->getId() != '') {
                    printSimpleRow("ID:","id",$element->getId());
                    echo "<script>$('input[name=id]').prop('disabled', true); </script>";
                }
                printSimpleRow("Nome:","nome",$element->getNome());
                printSimpleRow("Cognome:","cognome",$element->getCognome());
                printSimpleRow("Sito:","sito",$element->getSito());
                ?>
            </table>
        </td>
        <td>
            <?php
            printImageBox($element->getImgBig(), '../tipress/img/autori/');
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