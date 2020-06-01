<?php
session_start();
include_once 'serverconnect.inc';
$query1 ="insert into friend_req(user,friend) values('".$_SESSION['user']."','".$_SESSION['currentuser']."')";
mysql_query($query1,$link);
$des = <<<PAGE
<html>
  <head>
    <title>Friend request sent</title>
    <META HTTP-EQUIV="refresh" CONTENT="6;URL=Home.php">
</head>
  <body>
<table align="center" >
        <tr><td><label><em><strong>A FRIEND REQUEST HAVE BEEN SENT HAVE PATIENT WHILE YOUR FRIEND ACCEPT<br/>
        You are Redirected to Login Page</strong></em></label>
        <br/></td>
        </tr>
        <tr><td align="center"><img height="50 px" width="50px" src="document images/system image/ajax-loader (3).gif"/>
        </td></tr>
       <tr><td align="centre" colspan="3"><div align="center"><strong>&copy; Soumya Mondal 2010</strong></div></td>
       </tr>
   </table>
</body>
</html>
PAGE;
echo $des;
?>
