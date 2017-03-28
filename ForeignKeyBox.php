<?php
require_once('propel.php');
require_once('find_element.php');
require_once('AutocompleteBox.php');
/**
 * Created by PhpStorm.
 * User: Lorenzo Toso
 * Date: 28.03.2017
 * Time: 15:27
 */

class ForeignKeyBox
{
    public static function from($column_name, $value, $class)
    {
        $elements = findAllOf($class);
        $element = findById($class, $value);
        AutocompleteBox::of($elements,$column_name)->printBox()->select($element);
    }
}
