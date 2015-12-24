<?php
include('Header.php');
require('authentification.php');
require('AuthorRepository.php');
require('Searchbox.php');

$elementRepository = new AuthorRepository();
$elements = $elementRepository->getElementList();

if(isAddition() || isModification())
{
    //$modifiedElement = $elementRepository->
}

$element = findElement($elementRepository);

Searchbox::printSearchbox($elements, $element);
$elementRepository->printForm($element);

include('Footer.html');


function findElement(EntityRepository $repository){
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
    return filter_input(INPUT_POST,'action',FILTER_SANITIZE_STRING) == 'new';
}
function isDeletion(){
    return filter_input(INPUT_POST,'action',FILTER_SANITIZE_STRING) == 'delete';
}
function getElementId(){
    return filter_input(INPUT_GET, 'element',FILTER_SANITIZE_NUMBER_INT);
}