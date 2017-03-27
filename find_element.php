<?php
/**
 * Created by PhpStorm.
 * User: Lorenzo Toso
 * Date: 26.03.2017
 * Time: 19:52
 */
require('Base/' . $class . '.php');
require('Base/' . $class . 'Query.php');
require($class . 'Query.php');
require($class . '.php');
require('Map/' . $class . 'TableMap.php');


$queryClass = ($class . 'Query');
$q = new $queryClass;
$elements = $q->find()->getData();
$element = null;
$id = getID();
$action = getAction();
if($id != "")
{
    $possibleElement = $q->findById($id);
    if($possibleElement->count() > 0)
    {
        $element = $possibleElement[0];
    }
    else
    {
        echo "No element with ID " . $id . " was found.";
    }
}
else if($action != null){
    echo "No matching element was found.";
}