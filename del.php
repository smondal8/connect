<?php
session_start();
include_once 'serverconnect.inc';
//$url1 = "Home.php";
$query1 = "delete from friend where user='".$_SESSION['currentuser']."' AND friend='".$_GET['user']."'";
$query2 = "delete from friend where user='".$_GET['user']."' AND friend='".$_SESSION['currentuser']."'";
mysql_query($query1, $link);
mysql_query($query2, $link);
sleep(2);
?>
<html>
<head>
    <title>LOGOUT</title>
    <META HTTP-EQUIV="refresh" CONTENT="4;URL=Home.php">
</head>
   <body>
   <table align="center" >
        <tr><td><label><em><strong>Deleting your friend please wait...</strong></em></label>
        <br/></td>
        </tr>
        <tr><td align="center"><img height="50 px" width="50px" src="document images/system image/ajax-loader (3).gif"/>
        </td></tr>
       <tr><td align="centre" colspan="3"><div align="center"><strong>&copy; Soumya Mondal 2010</strong></div></td>
       </tr>
   </table>
  </body>
</html>
