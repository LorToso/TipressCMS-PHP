<?php
include('Header.php');
require('authentification.php');
include('propel.php');
include('Searchbox.php');
include('basic_functions.php');

$class = 'Libri';

print_r($_POST);
//echo "<script>$('#nav_autori').css('color','white','background-color','black');</script>";
include('cms.php');
include('Footer.html');
