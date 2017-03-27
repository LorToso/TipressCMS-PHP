<?php
/**
 * Created by PhpStorm.
 * User: Lorenzo Toso
 * Date: 27.03.2017
 * Time: 14:11
 */
include($class . 'Form.php');

include('find_element.php');

Searchbox::printSearchbox($elements, $element);

include('action_handling.php');

if($element != null)
{
    $formClass = $class . 'Form';
    $formClass::printModificationForm($element);
}