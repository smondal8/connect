<?php
session_start();
include_once 'serverconnect.inc';
$query = "select userid from user_info_pro where userid='".$_SESSION['currentuser']."'";
$res = mysql_query($query, $link);
$id = mysql_fetch_row($res);
if($id[0]!= "")   ////////check wheather already been updated//////
{
///////////////////////make the changes permanent///////////////
$query_pro = "update user_info_pro set degree='".$_POST['degree']."',skill='".$_POST['skill']."',drream='".$_POST['dream']."',after_10_years='".$_POST['tenyr']."',subject='".$_POST['sub']."' where userid='".$_SESSION['currentuser']."'";
mysql_query($query_pro, $link);
//echo $query_gen;
}
else
{  ////////////insrt for the very frst time/////////////////////
    $query_ins = "insert into user_info_pro(userid,degree,skill,drream,after_10_years,subject) values ('".$_SESSION['currentuser']."','".$_POST['degree']."','".$_POST['skill']."','".$_POST['dream']."','".$_POST['tenyr']."','".$_POST['sub']."')";
   echo $query_ins;
   mysql_query($query_ins, $link);
}
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
