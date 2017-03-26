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
    $element = new Autori();
}
else if($action == "insert") {
    $element = new Autori();
    setFromPost($element);
    $element->save();
    echo "Element " . $element->getDescriptor() . " was successfully created.";
}
else if($action == "update")
{
    setFromPost($element);
    $element->save();
    echo "Element " . $element->getDescriptor() . " was successfully modified.";
}