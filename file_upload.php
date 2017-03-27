<?php
require('propel.php');
// Source: https://www.php-einfach.de/php-tutorial/dateiupload/
//echo "Skript is run.";
if(empty($_POST['entitytype']) || empty($_POST['filetype']))
{
    die("error: No Type specified.");
}
$entity_type = $_POST['entitytype'];
$file_type = $_POST['filetype'];

$allowed_entities = array('Autori','Libri','Notizie','Clienti');
if(!in_array($entity_type,$allowed_entities))
    die("error: Unidentified Entity.");

include("Base/" . $entity_type . ".php");
include($entity_type . ".php");



$upload_folder = $entity_type::getPathFor($file_type); //Das Upload-Verzeichnis
$filename = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
$extension = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));


//Überprüfung der Dateiendung
$allowed_extensions = array('png', 'jpg', 'jpeg', 'gif');
if(!in_array($extension, $allowed_extensions)) {
    die("error: Only the following file formats are allowed: " . implode(",", $allowed_extensions));
}

//Überprüfung der Dateigröße
$max_size = 2*1024*1024;
if($_FILES['file']['size'] > $max_size) {
    die("error: Do not upload files bigger than 2Mb!");
}

//Überprüfung dass das Bild keine Fehler enthält
if(function_exists('exif_imagetype')) { //Die exif_imagetype-Funktion erfordert die exif-Erweiterung auf dem Server
    $allowed_types = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
    $detected_type = exif_imagetype($_FILES['file']['tmp_name']);
    if(!in_array($detected_type, $allowed_types)) {
        die("error: Only images are allowed.");
    }
}

//Pfad zum Upload
$new_path = $upload_folder.$filename.'.'.$extension;

//Neuer Dateiname falls die Datei bereits existiert
if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
    $id = 1;
    do {
        $new_path = $upload_folder.$filename.'_'.$id.'.'.$extension;
        $id++;
    } while(file_exists($new_path));
}

//Alles okay, verschiebe Datei an neuen Pfad
move_uploaded_file($_FILES['file']['tmp_name'], $new_path);
echo $new_path;
?>