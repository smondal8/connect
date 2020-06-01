<?php
session_start();
include_once 'serverconnect.inc';
if(isset ($_POST['user'])&&isset ($_POST['pass']))
{
    //echo $_POST['pass'];
    
    $url1 = "Home.php";
    $url2 = "error_login.html";
    
    $quer = "select password from user_info where userid = '".$_POST['user']."'";
    $res = mysql_query($quer, $link);
    
    $a = mysql_fetch_row($res);
    //echo $a[0];
    $encryptedpass = sha1($_POST['pass']);
    sleep(2);
    if(isset ($res)&& $encryptedpass==$a[0])
    {
        
        $_SESSION['user']= $_POST['user'];
        $_SESSION['currentuser']= $_POST['user'];
        session_commit();
       header('Location: ' . $url1);
    }
    else
    {
        header('Location: ' . $url2);
    }
}
?>
