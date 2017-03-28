<?php
/**
 * Created by PhpStorm.
 * User: Lorenzo Toso
 * Date: 26.03.2017
 * Time: 19:52
 */

function findAllOf($class)
{
    require_once('Base/' . $class . '.php');
    require_once('Base/' . $class . 'Query.php');
    require_once($class . 'Query.php');
    require_once($class . '.php');
    require_once('Map/' . $class . 'TableMap.php');

    $queryClass = ($class . 'Query');
    $q = new $queryClass;
    $elements = $q->find()->getData();
    return $elements;
}
function findById($class, $id)
{
    require_once('Base/' . $class . '.php');
    require_once('Base/' . $class . 'Query.php');
    require_once($class . 'Query.php');
    require_once($class . '.php');
    require_once('Map/' . $class . 'TableMap.php');

    $queryClass = ($class . 'Query');
    $q = new $queryClass;
    $possibleElement = $q->findById($id);
    if($possibleElement->count() > 0)
    {
        $element = $possibleElement[0];
    }
    else
    {
        $element = null;
    }
    return $element;
}
