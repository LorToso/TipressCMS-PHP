<?php 
class AuthorForm 
{
    static function printForm(author $element)
    {
    ?>

<form method="post">
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
            ID:
        </td>
        <td>
            <input type="text" id="idbox" name="id" disabled value="<?php echo $element->values['id']; ?>" />
        </td>
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
    <tr>
        <td>
            Immagine:
        </td>
        <td width="100%">
            <?php include("imagebox.html") ?>
            <?php 
            if($element->values['img_big'] != null && $element->values['img_big'] != ""){
                echo "<script>setImage('..//img//autori//" . $element->values['img_big'] . "');</script>";
            }
            ?>
        </td>
    </tr>
</table>
<input hidden="" id="chosenElement" name="element" value="<?php echo $element->values['id'] ?>" />

<div id="formbuttonbox">
    <button type="submit" name="action" value="change" id="changebutton">Modifica!</button>
    <button type="submit" name="action" value="delete" id="deletebutton">Elimina!</button>
</div>

</form>
    <?php
    }
}
