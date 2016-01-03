<?php
include('Header.php');
require('authentification.php');
require('AuthorRepository.php');
require('Searchbox.php');

$elementRepository = new AuthorRepository();
$elements = $elementRepository->getElementList();
$element = findSelectedElement($elementRepository);

Searchbox::printSearchbox($elements, $element);
$elementRepository->printBox($element);

if(isAddition()){
    echo "<br>--------POST: <br><br><br><br>";
    print_r($_POST);
    echo "<br>--------GET: <br><br><br><br>";
    print_r($_GET);
}

if(isModification() || isDeletion())
{
    //handleChanges($elementRepository);
    echo "<br>--------POST: <br><br><br><br>";
    print_r($_POST);
    echo "<br>--------GET: <br><br><br><br>";
    print_r($_GET);
}
else
{
$elementRepository->printForm($element);
}


include('Footer.html');


function findSelectedElement(EntityRepository $repository){
    $elementid = getElementId();
    
    if ($elementid == null) {
        return $repository->getDefaultElement();
    }
    return $repository->getElementById($elementid);
}
function isModification(){
    return filter_input(INPUT_POST,'action',FILTER_SANITIZE_STRING) == 'change';
}
function isAddition(){
    return filter_input(INPUT_GET,'action',FILTER_SANITIZE_STRING) == 'new';
}
function isDeletion(){
    return filter_input(INPUT_POST,'action',FILTER_SANITIZE_STRING) == 'delete';
}
function getElementId(){
    return filter_input(INPUT_GET, 'element',FILTER_SANITIZE_NUMBER_INT);
}
function handleChanges(EntityRepository $repository)
{
    if(isDeletion())
    {
        $id = getElementId();
        return $repository->deleteById($id);
    }
    if (isAddition()) {
        $newelement = $repository->newFromPostParameters($_POST);
        return $repository->insert($newelement);
    }
    if(isModification()){
        $modifiedElement = $repository->newFromPostParameters($_POST);
        $originalElement = $repository->getElementById($modifiedElement->values['id']);
        $differences = $originalElement->compare($modifiedElement);
        return $repository->modify($originalElement->values['id'], $differences);
    }
}