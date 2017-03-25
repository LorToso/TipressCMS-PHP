<?php
include('Header.php');
include('propel.php');
include('Base/Autori.php');
include('Base/AutoriQuery.php');
include('AutoriQuery.php');
include('Autori.php');
include('Map/AutoriTableMap.php');
include('Searchbox.php');
include('authorForm.php');

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
        return $_POST["action"];
    }
    else if(isGet())
    {
        return $_GET["action"];
    }
    return null;
}
function setFromPost(Autori $element)
{
    $element->setNome($_POST["nome"]);
    $element->setCognome($_POST["cognome"]);
    $element->setSito($_POST["sito"]);
    $element->setRiconoscimenti($_POST["riconoscimenti"]);
    $element->setBiografiaBreve($_POST["biografia_breve"]);
    $element->setBiografia($_POST["biografia"]);
    // TODO img_big
    // TODO img_small

}

$q = new AutoriQuery();
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

Searchbox::printSearchbox($elements, $element);


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

if($element != null)
{
    AuthorForm::printModificationForm($element);
}




echo "<br>--------POST:<br>";
print_r($_POST);
echo "<br>--------GET:<br>";
print_r($_GET);

include('Footer.html');
