<?php
include_once 'serverconnect.inc';
sleep(1);
$q = "select userid from user_info where userid = '".$_GET['usr']."'";
$r = mysql_query($q, $link);
$av = mysql_fetch_row($r);
if($av[0]=="")
echo "Available";
else
echo "User already exist";
?>
