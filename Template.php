<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <?php GetTitle() ?>
    <title> Funny title</title>
    <link rel="stylesheet" type="text/css" href="Style.css"/>
</head>
<body>
    <script src="jquery-1.11.3.js"></script>
    <div class="contentbox">
        <img src="img/header.jpg" alt="Header"/>
    </div>
    <?php include 'NavigationBar.html'; ?> 

    <div class="contentbox">
        <img src="img/header2.jpg" alt="Header" />
    </div>
    <div class="contentbox" id="contentbox">
</body>
</html>    