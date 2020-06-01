<?php
session_start();
//include_once 'serverconnect.inc';
function addasfriend($a,$b)   /////////////////////////////add as friend/////////////////////////
{
    include 'serverconnect.inc';
    $query1 = "insert into friend(user,friend)values('".$a."','".$b."')";
    $query2 = "insert into friend(user,friend)values('".$b."','".$a."')";
    mysql_query($query1, $link);
    mysql_query($query2, $link);
}
function delfrndreq($c,$d)   /////////////////////////////delete entry frnd_req////////////////////
{
    include 'serverconnect.inc';
    $query3 ="delete from friend_req where user='".$c."' AND friend='".$d."'";
    mysql_query($query3,$link);
    //print "<script type=\"javascript\">alert(";
    //print $query3;
    //return 0;
    //print ");</script>";
}

    if($_POST['sbmt']=="No")
    {
        $url1 = "Home.php";
        delfrndreq($_SESSION['currentuser'],$_POST['frnrq']);
        header('Location: ' . $url1);
    }
    else
    {
        $url1 = "Home.php";
        addasfriend($_SESSION['currentuser'],$_POST['frnrq']);
        delfrndreq($_SESSION['currentuser'],$_POST['frnrq']);
        header('Location: ' . $url1);
    }





?>
