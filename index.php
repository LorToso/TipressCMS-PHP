<?php
require('Header.php');
require('authentification.php');
require('authorRepository.php');
?>

<?php
$elementRepository = new authorRepository();
$elements = $elementRepository->getElementList();
$element = findElement($elementRepository);

printDatalist($elements);

?>

<form method="get" action="<?php echo $_SERVER["REQUEST_URI"]; ?>" >
    Cerca:
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
    <button type="submit" name="action" value="find">Cerca!</button>
    <button type="submit" name="action" value="new">Nuovo!</button>

</form>
<br />
<form>
    <?php $elementRepository->PrintForm($element); ?>
    <input hidden="" id="chosenElement" name="element" value="<?php echo $element->id ?>" />
    <button type="submit" name="action" value="change">Crea/Modifica! </button>
    <button type="submit" name="action" value="delete">Elimina! </button>
</form>



<?php

function findElement(EntityRepository $repository)
{
    if(!empty($_GET['element']))
    {
        $elementid = $_GET['element'];
        return $repository->getElementById($elementid);
    }
    else
    {
        return $repository->getDefaultElement();
    }
}
function printDatalist(array $elements)
{
    echo "<datalist id=\"elements\">";
    foreach($elements as $a){
        echo "<option id=\"" . $a->id .  "\" value=\"" . $a->GetDescriptor(). "\"></option>";
    }
    echo "</datalist>";
}
include('Footer.html');
