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
<script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>
<script>
    var editorCfg =
    {
        language: 'it',
        height: 50
    }
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
            <script> CKEDITOR.replace('riconoscimenti', editorCfg); </script>
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
            <script> CKEDITOR.replace('biografia_breve', editorCfg); </script>
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
            <script> CKEDITOR.replace('biografia', editorCfg); </script>
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
}


?>