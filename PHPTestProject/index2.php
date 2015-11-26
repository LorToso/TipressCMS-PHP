<?php
require('Header.php');
require('authentification.php');
require('authorRepository.php');
?>

<?php
$elementRepository = new authorRepository();
$elements = $elementRepository->getElementList();

$elementid = $_GET['element'];
$element = $elements[$elementid];

if(is_null($element))
    $element = $elementRepository->getDefaultElement();

echo "<datalist id=\"elements\">";
foreach($elements as $a){
    echo "<option id=\"" . $a->id .  "\" value=\"" . $a->GetDescriptor(). "\"></option>";
}
echo "</datalist>";
?>

<form action=<?php echo $_SERVER["REQUEST_URI"]; ?> method="get">
    Cerca autore:
    <script>
        function chooser(sel) {
            var value = sel.value;
            var list = $('#elements');
            var listEntry = $(list).find('option[value="' + value + '"]');
            var id = listEntry.attr('id');

            var field = document.getElementById('chosenElement');
            field.value = id;
        }
    </script>


    <input id="element" list="elements" onchange="chooser(this)" value="<?php echo $element->GetDescriptor()?>" />
    <input hidden="" id="chosenElement" name="element" value="<?php echo $element->id ?>" />
    <button type="submit">Cerca!</button>
    <button type="submit">Nuovo!</button>

</form>
<br />
<form>
    <?php $elementRepository->PrintForm($element); ?>

    <button type="submit">Crea/Modifica! </button>
    <button type="submit">Elimina! </button>
</form>



<?php
include('Footer.html');
?>