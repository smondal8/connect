<?php
session_start();
include_once 'serverconnect.inc';
$url1 = "Messagebox.php?user=".$_SESSION['user'];
$mes = $_POST['message'];
$query = "insert into message(user,sender,body,date) values ('".$_SESSION['user']."','".$_SESSION['currentuser']."','".$mes."','".date("F j, Y, g:i a")."')";
$result = mysql_query($query, $link);
header('Location: ' . $url1);
?>
   