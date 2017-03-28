<?php

/**
 * Created by PhpStorm.
 * User: Lorenzo Toso
 * Date: 28.03.2017
 * Time: 16:08
 */
class DatalistManager
{
    private static $datalists = array();
    private static function exists($name)
    {
        return in_array($name,self::$datalists);
    }
    private static function addName($name)
    {
        if(!self::exists($name))
        {
            array_push(self::$datalists,$name);
            return true;
        }
        return false;
    }
    private static function getUniqueName($name)
    {
        return "datalist_" . $name;
    }
    public static function add(array $elements)
    {
        $name = DatalistManager::getUniqueName(get_class($elements[0]));
        if(self::addName($name))
        {
            echo '<datalist id="' . $name . '">';
            foreach($elements as $a){
                echo '<option id="' . $a->getId() .  '" value="' . $a->getDescriptor(). '"></option>';
            }
            echo "</datalist>";
        }
        return $name;
    }
}