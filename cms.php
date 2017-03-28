<?php
/**
 * Created by PhpStorm.
 * User: Lorenzo Toso
 * Date: 27.03.2017
 * Time: 14:11
 */
require_once($class . 'Form.php');
require_once('find_element.php');

$elements = findAllOf($class);
$element = null;
$id = getID();
$action = getAction();
if($id != "")
{
    $element = findById($class, $id);
    if($element == null)
    {
        echo "No element with ID " . $id . " was found.";
    }
}
else if($action != null){
    echo "No matching element was found.";
}

Searchbox::printSearchbox($elements, $element);

include('action_handling.php');

if($element != null)
{
    $formClass = $class . 'Form';
    $formClass::printModificationForm($element);
}