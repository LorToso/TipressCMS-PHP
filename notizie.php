<?php
include('Header.php');
require_once('authentification.php');
require_once('propel.php');
include('Searchbox.php');
include('basic_functions.php');

$class = 'News';

//print_r($_POST);
echo "<script>$('#nav_notizie').css({'color':'white','background-color':'black'});</script>";
include('cms.php');
include('Footer.html');
