<?php
require('Header.php');
require('authentification.php');
require('authorRepository.php');
require('AutocompleteBox.php');
?>

<?php
$elementRepository = new authorRepository();
$elements = $elementRepository->getElementList();
$element = findElement($elementRepository);

AutocompleteBox::printBox($elements, $element);
//<button type="submit" name="action" value="new">Nuovo!</button>
AuthorForm::printForm($element);

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
include('Footer.html');
