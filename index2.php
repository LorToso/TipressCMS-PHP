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

$q = new AutoriQuery();
$elements = $q->find()->getData();

if(!empty($_GET["id"]))
{
    $q = new AutoriQuery();
    $element = $q->findById($_GET["id"])[0];

    if(!empty($_GET["action"]))
    {

    }
}
else
{
    $element = $elements[0];
}
Searchbox::printSearchbox($elements, $element);
AuthorForm::printModificationForm($element);



echo "<br>--------POST:<br>";
print_r($_POST);
echo "<br>--------GET:<br>";
print_r($_GET);

include('Footer.html');
