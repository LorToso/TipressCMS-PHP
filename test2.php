
<?php 
// In PHP kleiner als 4.1.0 sollten Sie $HTTP_POST_FILES anstatt 
// $_FILES verwenden.

$uploaddir = '/var/www/uploads/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

echo '<pre>';

echo "<span>Your File Uploaded Succesfully...!!</span><br/>";
echo "<br/><b>File Name:</b> " . $_FILES["file"]["name"] . "<br>";
echo "<b>Type:</b> " . $_FILES["file"]["type"] . "<br>";
echo "<b>Size:</b> " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
echo "<b>Temp file:</b> " . $_FILES["file"]["tmp_name"] . "<br>";

print "</pre>";

?>
