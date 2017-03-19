<?php
include('Header.php');
include('propel.php');
include('Base/Autori.php');
include('Base/AutoriQuery.php');
include('AutoriQuery.php');
include('Autori.php');
include('Map/AutoriTableMap.php');

$q = new AutoriQuery();
$q->crea

$q = AutoriQuery::create()->findById(1005);
print($q);
$q->getData()->set('cognome','Berste');
print($q);
$q->save();
$q = AutoriQuery::create()->findById(1005);
print($q);

echo "<br>--------POST:<br>";
print_r($_POST);
echo "<br>--------GET:<br>";
print_r($_GET);

include('Footer.html');
