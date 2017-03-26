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
include('basic_functions.php');

function setFromPost(Autori $element)
{
    $element->setNome($_POST["nome"]);
    $element->setCognome($_POST["cognome"]);
    $element->setSito($_POST["sito"]);
    $element->setRiconoscimenti($_POST["riconoscimenti"]);
    $element->setBiografiaBreve($_POST["biografia_breve"]);
    $element->setBiografia($_POST["biografia"]);
    $element->setImgBig($_POST["img_big"]);

}

//echo "<script>$('#nav_autori').css('color','white','background-color','black');</script>";

$q = new AutoriQuery();

include('find_element.php');

Searchbox::printSearchbox($elements, $element);

include('action_handling.php');

if($element != null)
{
    AuthorForm::printModificationForm($element);
}

//echo "<br>--------POST:<br>";
//print_r($_POST);
//echo "<br>--------GET:<br>";
//print_r($_GET);

include('Footer.html');
