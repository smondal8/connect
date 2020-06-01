<?php
session_start();
include_once 'serverconnect.inc';
//echo $_POST['id'];
       ////////////////////get message id ,delete and redirect//////////////////
        $url1 = "Messagebox.php?user=".$_SESSION['user'];
        $quer_del = "delete from message where id=".$_POST['id'];
        //echo $quer_del;
        $res = mysql_query($quer_del, $link);
        //echo "sucess full";
        header('Location: ' . $url1);
 ?>
