<?php
include('Header.php');
require('authentification.php');
require('AuthorRepository.php');
require('Searchbox.php');

$elementRepository = new AuthorRepository();
$elements = $elementRepository->getElementList();
$element = findSelectedElement($elementRepository);

Searchbox::printSearchbox($elements, $element);

if(eventOccured()){
    handleEvent($elementRepository);
}
else{
    $elementRepository->printBox($element);
    $elementRepository->printModificationForm($element);
}


    echo "<br>--------POST:<br>";
    print_r($_POST);
    echo "<br>--------GET:<br>";
    print_r($_GET);
    
include('Footer.html');


function findSelectedElement(EntityRepository $repository){
    $elementid = getElementId();
    
    if ($elementid == null) {
        return $repository->getDefaultElement();
    }
    return $repository->getElementById($elementid);
}
function hasBeenModified(){
    return filter_input(INPUT_POST,'action',FILTER_SANITIZE_STRING) == 'change';
}
function isAboutToCreateNewElement(){
    return filter_input(INPUT_GET,'action',FILTER_SANITIZE_STRING) == 'createnew';
}
function hasBeenAdded(){
    return filter_input(INPUT_POST,'action',FILTER_SANITIZE_STRING) == 'iscreated';
}
function hasBeenDeleted(){
    return filter_input(INPUT_POST,'action',FILTER_SANITIZE_STRING) == 'delete';
}
function getElementId(){
    return filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT);
}
function eventOccured(){
    return isAboutToCreateNewElement() || hasBeenAdded() || hasBeenModified() || hasBeenDeleted();
}
function handleEvent(EntityRepository $elementRepository){
    if(isAboutToCreateNewElement()){
        $elementRepository->printAdditionForm();    
        Searchbox::clear();
        echo "ADDITION<br>";
    }
    else if (hasBeenAdded()){
        $newElement = $elementRepository->newFromPostParameters($_POST);
        $elementRepository->insert($newElement);
    }
    else if(hasBeenModified()){
        $newElement  = $elementRepository->newFromPostParameters($_POST);
        $origElement = $elementRepository->getElementById($newElement->values['id']);
        $elementRepository->modify($origElement, $newElement);
        echo "MODIFICATION<br>";
    }
    else if(hasBeenDeleted()){
        $toDeleteId = filter_input(INPUT_POST, 'id',FILTER_SANITIZE_NUMBER_INT);
        $elementRepository->delete($toDeleteId);
        echo "DELETION<br>";
    }   
}