<?php 
class AuthorForm 
{
    public static function printModificationForm(author $element){
        echo '<form method="post">';
        
        AuthorForm::printForm($element);
        
        echo '<div id="formbuttonbox">';
        echo '<button type="submit" name="action" value="change" id="changebutton">Modifica!</button>';
        echo '<button type="submit" name="action" value="delete" id="deletebutton">Elimina!</button>';
        echo '</div>';
        
        echo '</form>';
    }
    
    
    public static function printAdditionForm(){
        echo '<form method="post" action="' . getUrlWithoutGetParams() . '">';
        
        AuthorForm::printForm(Author::newEmpty());
        
        echo '<div id="formbuttonbox">';
        echo '<button type="submit" name="action" value="iscreated" id="createbutton">Crea!</button>';
        echo '</div>';
        
        echo '</form>';        
    }
    private static function printForm(Author $element){
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
                    if($element->values['id'] != ''){
                    ?>
                    <td>
                        ID:
                    </td>
                    <td>
                        <input type="text" id="idbox" name="id" readonly="readonly" value="<?php echo $element->values['id']; ?>" />
                    </td>
                    <?php
                    }
                    ?>
                </tr>
                <tr>
                    <td>
                        Nome:
                    </td>
                    <td width="100%">
                        <input type="text" id="nome" name="nome" value="<?php echo $element->values['nome']; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Cognome:
                    </td>
                    <td width="100%">
                        <input type="text" id="cognome" name="cognome" value="<?php echo $element->values['cognome']; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Sito:
                    </td>
                    <td width="100%">
                        <input type="text" id="sito" name="sito" value="<?php echo $element->values['sito']; ?>"/>
                    </td>
                </tr>
            </table>
        </td>
        <td>
            
            <?php include("imagebox.html") ?>
            <?php 
            if($element->values['img_big'] != null && $element->values['img_big'] != ""){
                echo "<script>setImage('..//img//autori//" . $element->values['img_big'] . "');</script>";
            }
            ?>
        </td>
    </tr>
    <tr><td><br></td></tr>
    <tr>
        <td>
            Riconoscimenti:
        </td>
        <td width="100%">
            <textarea id="riconoscimenti" name="riconoscimenti">
                <?php echo $element->values['riconoscimenti']; ?>
            </textarea>
            <script> CKEDITOR.replace('riconoscimenti', fullEditorCfg); </script>
        </td>
    </tr>
    <tr>
        <td>
            Biografia breve:
        </td>
        <td width="100%">
            <textarea id="biografia_breve" name="biografia_breve">
                <?php echo $element->values['biografia_breve']; ?>
            </textarea>
            <script> CKEDITOR.replace('biografia_breve', fullEditorCfg); </script>
        </td>
    </tr>
    <tr>
        <td>
            Biografia:
        </td>
        <td width="100%">
            <textarea id="biografia" name="biografia">
                <?php echo $element->values['biografia']; ?>
            </textarea>
            <script> CKEDITOR.replace('biografia', fullEditorCfg); </script>
        </td>
    </tr>
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