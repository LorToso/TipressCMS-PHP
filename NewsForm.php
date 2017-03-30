<?php
require_once('FormMethods.php');

class NewsForm
{
    public static function printModificationForm(News $element){
        echo '<form method="post">';
        self::printForm($element);
        printFormButtons($element);
        echo '</form>';
    }

    private static function printForm(News $element){
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
                        printSimpleRow("Titolo:","titolo",$element->getTitolo());
                        ?>
                    </table>
                </td>
                <td>
                </td>
            </tr>
            <tr><td><br></td></tr>
            <?php
            printHTMLRow("Testo breve:","testo_breve",$element->getTesto());
            printHTMLRow("Testo:","testo",$element->getTestoBreve());
            ?>
        </table>
        <?php
    }
}