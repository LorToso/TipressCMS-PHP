<?php
/**
 * Created by PhpStorm.
 * User: Lorenzo Toso
 * Date: 26.03.2017
 * Time: 19:49
 */

if($action == "delete")
{
    echo "Element: " . $element->getDescriptor() . " has been deleted.";
    $element->delete();
    $element = null;
}
else if($action == "create")
{
    $element = new $class;
}
else if($action == "insert") {
    $element = new $class;
    $class::fromPost($element);
    $element->save();
    echo "Element " . $element->getDescriptor() . " was successfully created.";
}
else if($action == "update")
{
    $class::fromPost($element);
    $element->save();
    echo "Element " . $element->getDescriptor() . " was successfully modified.";
}