<?php
require_once('FormMethods.php');

class ClientiForm
{
    public static function printModificationForm(Clienti $element){
        echo '<form method="post">';
        self::printForm($element);
        printFormButtons($element);
        echo '</form>';
    }

    private static function printForm(Clienti $element){
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
                    printImageBox('img_big',$element->getImgBig(), 'Clienti');
                    ?>
                </td>
            </tr>
            <tr><td><br></td></tr>
            <?php
            printHTMLRow("Descrizione","descrizione",$element->getDescrizione());
            ?>
        </table>
        <?php
    }
}