<?php
session_start();
include_once 'serverconnect.inc';

$query = "select userid from user_info_personal where userid='".$_SESSION['currentuser']."'";
$res = mysql_query($query, $link);
$id = mysql_fetch_row($res);
if($id[0]!= "")   ////////check wheather already been updated//////
{
///////////////////////make the changes permanent///////////////
$query_per = "update user_info_personal set abt_me='".$_POST['abtme']."',perfectmatch='".$_POST['pmatch']."',best_feature='".$_POST['feature']."',idea_of_a_date='".$_POST['date']."',five_things='".$_POST['fivethings']."',extra_curricular='".$_POST['extra']."' where userid='".$_SESSION['currentuser']."'";
mysql_query($query_per, $link);
//echo $query_gen;
}
else
{////////////insrt for the very frst time/////////////////////
    $query_ins = "insert into user_info_personal(userid,abt_me,perfectmatch,best_feature,idea_of_a_date,five_things,extra_curricular) values ('".$_SESSION['currentuser']."','".$_POST['abtme']."','".$_POST['pmatch']."','".$_POST['feature']."','".$_POST['date']."','".$_POST['fivethings']."','".$_POST['extra']."')";
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
