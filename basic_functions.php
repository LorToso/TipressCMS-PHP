<?php
/**
 * Created by PhpStorm.
 * User: Lorenzo Toso
 * Date: 26.03.2017
 * Time: 19:50
 */

function isGet()
{
    return !empty($_GET);
}
function isPost()
{
    return !empty($_POST);
}
function getID()
{
    if(isPost())
    {
        if(!empty($_POST["id"]))
        {
            return $_POST["id"];
        }
    }
    else if(isGet())
    {
        if(!empty($_GET["id"]))
        {
            return $_GET["id"];
        }
    }
    return 0;
}
function getAction()
{
    if(isPost())
    {
        if(!empty($_POST["action"]))
        {
            return $_POST["action"];
        }
    }
    else if(isGet())
    {
        if(!empty($_GET["action"])) {
            return $_GET["action"];
        }
    }
    return null;
}