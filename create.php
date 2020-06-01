<?php
include_once 'serverconnect.inc';
////////////////////////upload image to the folder/////////////////////////
$target_path = "document images/user image/";
//$target_path = $target_path.$_SESSION['currentuser']."/";
/////////////////total target created ////////////////////////////
$target_path = $target_path.$_SESSION['currentuser'].basename($_FILES['img']['name']);
//echo $target_path;
//echo $_FILES['img']['tmp_name'];
move_uploaded_file($_FILES['img']['tmp_name'], $target_path);
//////////////////////file is moved to server path//////////////////
////////////////////insert to user_info and user_info_general/////////////
$query1 = "insert into user_info(userid,password,image,email,lastlogin) values('".$_POST['user']."','".sha1($_POST['pass'])."','".$_FILES['img']['name']."','".$_POST['email']."','')";
$query2 = "insert into user_info_general(userid,first_name,last_name,city,state,country,rel_status,sex,dob,pin) values('".$_POST['user']."','".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['city']."','".$_POST['state']."','".$_POST['jumpMenu']."','".$_POST['jumpMenu1']."','".$_POST['sex']."','','')";
$page = <<<PAGE
<html>
  <head>
    <title>Create new user:</title>
    <META HTTP-EQUIV="refresh" CONTENT="6;URL=login.php">
</head>
  <body>
<table align="center" >
        <tr><td><label><em><strong>Your account in our database created wait while redirecting to login page<br/>
        You are Redirected to Login Page</strong></em></label>
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
try
{
    $i = mysql_query($query1, $link);
    $j = mysql_query($query2, $link);
    if($i==1 && $j==1)
    {
    echo $page;
    }
}catch(Exception $e)
{
    die($e->getMessage());
}

?>
