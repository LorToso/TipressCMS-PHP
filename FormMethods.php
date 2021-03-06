<?php
require_once('Filebox.php');
require_once('ForeignKeyBox.php');
require_once('Imagebox.php');
/**
 * Created by PhpStorm.
 * User: Lorenzo Toso
 * Date: 27.03.2017
 * Time: 16:21
 */

function printHTMLRow($text, $columnName, $content)
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
    echo "<td style='white-space: nowrap'>";
    echo $text;
    echo "</td>";
    echo '<td width="100%">';
    echo '<input type="text" name="' . $columnName . '" value="' . $content . '"/>';
    echo "</td>";
    echo "</tr>";
}
function printImageBox($column_name, $value, $entity_type)
{
    Imagebox::from($column_name, $value, $entity_type,'Image');
}
function printFileBox($text, $column_name, $value, $entity_type)
{
    echo "<tr>";
    echo "<td>";
    echo $text;
    echo "</td>";
    echo '<td width="100%">';
    Filebox::from($column_name,$value,$entity_type,'document');
    echo "</td>";
    echo "</tr>";
}
function printCheckbox($text, $column_name, $value, $map = array(true => "true", false => "false"))
{
    echo "<tr>";
    echo "<td>";
    echo $text;
    echo "</td>";
    echo '<td width="100%">';
    echo "<input type='hidden' value='" . $map[false] . "' name='" . $column_name ."'>";
    $v = $value==$map[true]?"checked":"";
    echo "<input type='checkbox' value='" . $map[true] . "' name='" . $column_name ."' " . $v .">";
    echo "</td>";
    echo "</tr>";
}
function printOrderbox($text, $column_name, $value)
{
    echo "<tr>";
    echo "<td>";
    echo $text;
    echo "</td>";
    echo '<td width="100%">';

    echo "</td>";
    echo "</tr>";
}
function printFKBox($text, $column_name, $value, $foreignTable)
{
    echo "<tr>";
    echo "<td>";
    echo $text;
    echo "</td>";
    echo '<td width="100%">';
    ForeignKeyBox::from($column_name, $value, $foreignTable);
    echo "</td>";
    echo "</tr>";
}
function disableID()
{
    echo "<script>$('input[name=id]').prop('readonly', true); </script>";
}
function printFormButtons($element)
{

    echo '<div id="formbuttonbox">';

    if($element->isNew())
    {
        echo '<button type="submit" name="action" value="insert" id="createbutton">Crea!</button>';
    }
    else
    {
        echo '<button type="submit" name="action" value="update" id="changebutton">Modifica!</button>';
        echo '<button type="submit" name="action" value="delete" id="deletebutton" onclick="return confirm(\'Sei sicuro?\')">Elimina!</button>';
    }
    echo '</div>';
}
function getCurrentURL()
{
    return filter_input(INPUT_SERVER, 'REQUEST_URI');
}
function getUrlWithoutGetParams(){
    return substr(getCurrentURL(),0,strpos(getCurrentURL(),'?'));
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