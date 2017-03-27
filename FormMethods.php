<?php
/**
 * Created by PhpStorm.
 * User: Lorenzo Toso
 * Date: 27.03.2017
 * Time: 16:21
 */
function printHTMLRow($text,$columnName,$content)
{
    echo "<tr>";
    echo "<td>";
    echo $text;
    echo "</td>";
    echo '<td width="100%">';
    echo '<textarea id="' . $columnName . '" name="' . $columnName .'">';
    echo $content;
    echo '</textarea>';
    echo "<script> CKEDITOR.replace(" . $columnName . ", fullEditorCfg); </script>";
    echo "</td>";
    echo "</tr>";
}
function printSimpleRow($text,$columnName,$content)
{
    echo "<tr>";
    echo "<td>";
    echo $text;
    echo "</td>";
    echo '<td width="100%">';
    echo '<input type="text" name="' . $columnName . '" value="' . $content . '"/>';
    echo "</td>";
    echo "</tr>";
}
function printImageBox($image, $path)
{
    include("imagebox.php");
    if($image != null && $image != ""){
        echo "<script>setImage('" . $path . "', '" . $image . "');</script>";
    }
}
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