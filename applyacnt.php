<?php
session_start();
include_once 'serverconnect.inc';

////////////if paswword and image not provided///////
if($_POST['pass']=="" && $_FILES['imag1']['name']=="")
{
    $query1 = "update user_info set email='".$_POST['email']."' where userid='".$_SESSION['currentuser']."'";
    mysql_query($query1,$link);
    //echo "soumya";
}
else if($_POST['pass']=="")
{
//////////////////////delete old file from webapp//////////////////////
$q = "select image from user_info where userid='".$_SESSION['currentuser']."'";
$r = mysql_query($q, $link);
$img = mysql_fetch_row($r);
$path = "document images/user image/".$img[0];
unlink($path);

////////////////////////upload image to the folder/////////////////////////
$target_path = "document images/user image/";
//$target_path = $target_path.$_SESSION['currentuser']."/";
/////////////////total target created ////////////////////////////
$target_path = $target_path.$_SESSION['currentuser'].basename($_FILES['imag1']['name']);
//echo $target_path;

//echo $_FILES['img']['tmp_name'];
move_uploaded_file($_FILES['imag1']['tmp_name'], $target_path);
///////////////////////////store link in database////////////////
$query2 = "update user_info set image='".$_FILES['imag1']['name']."',email ='".$_POST['email']."' where userid='".$_SESSION['currentuser']."'";
//echo $query2;
mysql_query($query2, $link);
}
else if($_FILES['imag1']['name']=="" && $_POST['pass']!="" && $_POST['email']!="")
{
    $query3 = "update user_info set password='".sha1($_POST['pass'])."',email='".$_POST['email']."' where userid='".$_SESSION['currentuser']."'";
    mysql_query($query3, $link);
}
else if($_FILES['imag1']['name']!="" && $_POST['pass']!="" && $_POST['email']!="")
{
    ////////////////////////upload image to the folder/////////////////////////
$target_path = "document images/user image/";
/////////////////total target created ////////////////////////////
$target_path = $target_path.basename($_FILES['imag1']['name']);
//echo $target_path;

//echo $_FILES['img']['tmp_name'];
move_uploaded_file($_FILES['imag1']['tmp_name'], $target_path);


    $query4 = "update user_info set password='".sha1($_POST['pass'])."',email='".$_POST['email']."',image='".$_FILES['imag1']['name']."'where userid='".$_SESSION['currentuser']."'";
    mysql_query($query4, $link);
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
