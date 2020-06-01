<?php
session_start();
$url1 = "Myfrndz.php";
$_SESSION['user']= $_SESSION['currentuser'];
header('Location:'.$url1);
?>
