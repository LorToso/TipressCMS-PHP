<?php
require('Header.php');
require('authentification.php');
require('AuthorRepository.php');
require('Searchbox.php');
?>

<?php
$elementRepository = new AuthorRepository();
$elements = $elementRepository->getElementList();
$element = findElement($elementRepository);

Searchbox::printSearchbox($elements, $element);
//<button type="submit" name="action" value="new">Nuovo!</button>
$elementRepository->printForm($element);

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
