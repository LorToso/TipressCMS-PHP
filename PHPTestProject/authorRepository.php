<?php
require_once('author.php');
require_once('EntityRepository.php');
$authorList = array(
        1 => new author(1,'Lorenzo','Toso', 'riconoscimento','bio_breve','bio','im_small','im_big','sito'),
        2 => new author(2,'Roberto','Toso'),
        3 => new author(3,'Monika','Eingrieber'),
        4 => new author(4,'Anna-Láura','Eingrieber-Toso'),
    );
class authorRepository implements EntityRepository
{
    public function getElementList()
    {
        global $authorList;
        return $authorList;
    }
    public function getDefaultElement()
    {
        global $authorList;
        return array_shift(array_values($authorList));
    }
    public function PrintForm($element)
    {
?>
<script src="./ckeditor/ckeditor.js"></script>
<script>
    var fullEditorCfg =
    {
        language: 'it',
        height: 50,
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
    }

    var emptyEditorCfg =
    {
        language: 'it',
        height: 50,
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
        removeButtons: 'Source,Save,NewPage,Preview,Print,Templates,Find,Replace,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Outdent,Indent,Format,Styles,ShowBlocks,About,BidiLtr,BidiRtl,Language,CreateDiv,Image,Flash,Smiley,SpecialChar,PageBreak,Iframe,Anchor,Unlink,Link,Cut,Copy,Paste,PasteText,Redo,Undo,Bold,Italic,Underline,Strike,Subscript,Superscript,RemoveFormat,NumberedList,BulletedList,Blockquote,JustifyLeft,JustifyCenter,TextColor,Maximize,Font,FontSize,PasteFromWord,JustifyRight,JustifyBlock,Table,HorizontalRule,BGColor,SelectAll',
    };

</script>


<table>
    <tr>
        <td>
            ID:
        </td>
        <td>
            <input type="text" name="id" value="<?php echo $element->id; ?>" />
        </td>
    </tr>
    <tr>
        <td>
            Nome:
        </td>
        <td width="100%">
            <input type="text" id="nome" name="nome" value="<?php echo $element->nome; ?>" />
        </td>
    </tr>
    <tr>
        <td>
            Cognome:
        </td>
        <td width="100%">
            <input type="text" id="cognome" name="cognome" value="<?php echo $element->cognome; ?>" />
        </td>
    </tr>
    <tr>
        <td>
            Riconoscimenti:
        </td>
        <td width="100%">
            <textarea id="riconoscimenti" name="riconoscimenti">
                <?php echo $element->riconoscimenti; ?>
            </textarea>
            <script> CKEDITOR.replace('riconoscimenti', fullEditorCfg); </script>
            <!--<script>
                var editor = CKEDITOR.replace('riconoscimenti', emptyEditorCfg);

                CKEDITOR.instances.riconoscimenti.on('blur', function () {
                    alert('blur');
                    //CKEDITOR.instances.riconoscimenti.destroy();
                    //CKEDITOR.replace('riconoscimenti', emptyEditorCfg);
                    //CKEDITOR.instances.riconoscimenti.config = emptyEditorCfg;
                    CKEDITOR.replace('riconoscimenti', emptyEditorCfg);
                });
                CKEDITOR.instances.riconoscimenti.on('focus', function () {
                    //alert('focus');
                    //CKEDITOR.instances.riconoscimenti.destroy();
                    //CKEDITOR.replace('riconoscimenti', fullEditorCfg);
                    //CKEDITOR.instances.riconoscimenti.config = fullEditorCfg;
                    CKEDITOR.replace('riconoscimenti', fullEditorCfg);
                });
            </script>-->
        </td>
    </tr>
    <tr>
        <td>
            Biografia breve:
        </td>
        <td width="100%">
            <textarea id="biografia_breve" name="biografia_breve">
                <?php echo $element->biografia_breve; ?>
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
                <?php echo $element->biografia; ?>
            </textarea>
            <script> CKEDITOR.replace('biografia', fullEditorCfg); </script>
        </td>
    </tr>
    <tr>
        <td>
            Sito:
        </td>
        <td width="100%">
            <input type="text" id="sito" name="sito" value="<?php echo $element->sito; ?>" />
        </td>
    </tr>
    <tr>
        <td>
            Immagine:
        </td>
        <td width="100%">
            <?php include("imagebox.html")?>
        </td>
    </tr>
</table>
<?php
    }
    public function getElementById($id)
    {
        return $this->getDefaultElement();
    }
}


?>