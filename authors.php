<?php
require_once('Header.php');
require_once('authentification.php');
require_once('propel.php');
include('Searchbox.php');
include('basic_functions.php');

$class = 'Autori';

//echo "<script>$('#nav_autori').css('color','white','background-color','black');</script>";

print_r($_POST);

include('cms.php');
include('Footer.html');