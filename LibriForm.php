<?php 
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

<script src="./ckeditor/ckeditor.js"></script>
<script>
    var fullEditorCfg =
    {
        language: 'it',
        height: 100,
        toolbarGroups: [
            { name: 'document', groups: ['mode', 'document', 'doctools'] },
            { name: 'clipboard', groups: ['clipboard', 'undo'] },
            { name: 'editing', groups: ['find', 'selection', 'spellchecker', 'editing'] },
            { name: 'forms', groups: ['forms'] },
            { name: 'basicstyles', groups: ['basicstyles', 'cleanup'] },
            { name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi', 'paragraph'] },
            { name: 'links', groups: ['links'] },
            { name: 'insert', groups: ['insert'] },
            { name: 'styles', groups: ['styles'] },
            { name: 'colors', groups: ['colors'] },
            { name: 'tools', groups: ['tools'] },
            { name: 'others', groups: ['others'] },
            { name: 'about', groups: ['about'] }
        ],
        removeButtons: 'Source,Save,NewPage,Preview,Print,Templates,PasteText,Find,SelectAll,Replace,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Outdent,Indent,Format,Styles,ShowBlocks,About,BidiLtr,BidiRtl,Language,CreateDiv,Image,Flash,Smiley,SpecialChar,PageBreak,Iframe,Anchor,Unlink,Link',
    };
</script>
<table>
    <tr>
        <td>
            <table>
                <tr>
                    <?php
                    if($element->getId() != ''){
                    ?>
                    <td>
                        ID:
                    </td>
                    <td>
                        <input type="text" name="id" readonly="readonly" value="<?php echo $element->getId(); ?>" />
                    </td>
                    <?php
                    }
                    ?>
                </tr>
                <tr>
                    <td>
                        Titolo:
                    </td>
                    <td width="100%">
                        <input type="text" name="nome" value="<?php echo $element->getTitolo(); ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Autore1:
                    </td>
                    <td width="100%">
<!--                        <input type="text" id="cognome" name="cognome" value="--><?php //echo $element->getCognome(); ?><!--"/>-->
                    </td>
                </tr>
                <tr>
                    <td>
                        Autore2:
                    </td>
                    <td width="100%">
                        <!--                        <input type="text" id="cognome" name="cognome" value="--><?php //echo $element->getCognome(); ?><!--"/>-->
                    </td>
                </tr>
                <tr>
                    <td>
                        Autore3:
                    </td>
                    <td width="100%">
                        <!--                        <input type="text" id="cognome" name="cognome" value="--><?php //echo $element->getCognome(); ?><!--"/>-->
                    </td>
                </tr>
                <tr>
                    <td>
                        Tipo1:
                    </td>
                    <td width="100%">
                        <!--                        <input type="text" id="cognome" name="cognome" value="--><?php //echo $element->getCognome(); ?><!--"/>-->
                    </td>
                </tr>
                <tr>
                    <td>
                        IDgenere1:
                    </td>
                    <td width="100%">
                        <!--                        <input type="text" id="cognome" name="cognome" value="--><?php //echo $element->getCognome(); ?><!--"/>-->
                    </td>
                </tr>
                <tr>
                    <td>
                        Tipo2:
                    </td>
                    <td width="100%">
                        <!--                        <input type="text" id="cognome" name="cognome" value="--><?php //echo $element->getCognome(); ?><!--"/>-->
                    </td>
                </tr>
                <tr>
                    <td>
                        IDgenere2:
                    </td>
                    <td width="100%">
                        <!--                        <input type="text" id="cognome" name="cognome" value="--><?php //echo $element->getCognome(); ?><!--"/>-->
                    </td>
                </tr>
                <tr>
                    <td>
                        Tipo3:
                    </td>
                    <td width="100%">
                        <!--                        <input type="text" id="cognome" name="cognome" value="--><?php //echo $element->getCognome(); ?><!--"/>-->
                    </td>
                </tr>
                <tr>
                    <td>
                        IDgenere3:
                    </td>
                    <td width="100%">
                        <!--                        <input type="text" id="cognome" name="cognome" value="--><?php //echo $element->getCognome(); ?><!--"/>-->
                    </td>
                </tr>
                <tr>
                    <td>
                        Editore:
                    </td>
                    <td width="100%">
                        <input type="text" name="editore" value="<?php echo $element->getEditore(); ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Editore:
                    </td>
                    <td width="100%">
                        <input type="text" name="editore" value="<?php echo $element->getEditore(); ?>"/>
                    </td>
                </tr>
            </table>
        </td>
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