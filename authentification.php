<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (empty($_SESSION['authenticated']) || $_SESSION['authenticated']==false) {
    $_SESSION['redirect'] = $_SERVER["REQUEST_URI"];
    
    echo "<script> window.location.replace(\"" . "authenticate.php" . "\"); </script>";
    exit;
}
?>