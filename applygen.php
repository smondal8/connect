<?php
session_start();
include_once 'serverconnect.inc';
///////////////////////make the changes permanent///////////////
$query_gen = "update user_info_general set first_name='".$_POST['first']."',last_name='".$_POST['last']."',city='".$_POST['city']."',state='".$_POST['state']."',country='".$_POST['country']."',rel_status='".$_POST['rel']."',sex='".$_POST['sex']."',dob='".$_POST['dob']."',pin='".$_POST['pin']."' where userid='".$_SESSION['currentuser']."'";
mysql_query($query_gen, $link);
//echo $query_gen;
$page = <<<PAGE
<html>
  <head>
    <title>Applying changes:</title>
    <META HTTP-EQUIV="refresh" CONTENT="6;URL=Home.php">
</head>
  <body>
<table align="center" >
        <tr><td><label><em><strong>Applying your changes redirecting to Home page<br/>
        You are Redirected to Home Page</strong></em></label>
        <br/></td>
        </tr>
        <tr><td align="center"><img height="25 px" width="200px" src="document images/system image/ajax-loader.gif"/>
        </td></tr>
       <tr><td align="centre" colspan="3"><div align="center"><strong>&copy; Soumya Mondal 2010</strong></div></td>
       </tr>
   </table>
</body>
</html>
PAGE;
echo $page;
?>
