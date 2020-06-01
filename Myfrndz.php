<?php
session_start();
include_once 'serverconnect.inc';
?>
<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>My Friends:</title>
    </head>
    <body>
    <table width="100%" height="100%" align="center">
        <tr><td colspan="3"><?php include_once 'head.inc'; ?></td></tr>
        <tr>
            <td width="20%"> <?php include_once 'left.inc'; ?> </td>
        <td align="center">
    <table border="0" width="100%">
       <?php
       ///////////number of friends////////////////////////////////////

$query7 = "select count(user) from friend where user='".$_SESSION['user']."'";
$result7 = mysql_query($query7, $link);
$f  = mysql_fetch_row($result7);
       
       ////////////////////////search for friends//////////////////////////////////
       $quer_frnds = "select friend from friend where user='".$_SESSION['user']."'";
       $result = mysql_query($quer_frnds, $link);
       echo "<tr><td align=\"center\" colspan=\"3\"><h2> Your Search for My Friends ";
       //echo $_POST['search'];
       echo "given following result:</h2></td></tr>";

       while($frnd = mysql_fetch_row($result))
       {


           //echo $frnd[0];
           /////////////////////get info from tables abt frnd////////
           $quer_join = "select user_info.userid,user_info.image,user_info_general.first_name,user_info_general.last_name,user_info_general.city,user_info_general.state,user_info_general.country,user_info_general.rel_status,user_info_general.sex from user_info inner join user_info_general on user_info.userid=user_info_general.userid where user_info.userid='".$frnd[0]."'";
           $res = mysql_query($quer_join, $link);
           $id = mysql_fetch_row($res);
           if( $_SESSION['user']==$_SESSION['currentuser'])
                {
                     $enable ="href=del.php?user=$id[0]";
                }
                else
                {
                     $enable ="disabled=\"disabled\"";
                }
           print "<tr>";
           print "<td  align=\"center\"><img src=\"document images/user image/$id[1]\" width=\"50 px\" height=\"50 px\"/>";
           print "<br/> <strong>$id[2]  $id[3]</strong> </td>";
           print "<td align=\"center\"><strong> $id[4] ,  $id[5] <br/>  $id[6] <br/>  $id[7] , $id[8]</strong> </td>";
           print "<td  align=\"center\"><a href=rehome.php?user=$id[0]>View Profile</a><br/><a $enable>Delete from friendlist</a></td>";
           print "<div id=\"del\"></div>";
           print "</tr>";
       }
        ?>
    </table>
    </td>
    <td align="center" width="25%"><?php include_once 'right.inc'; ?></td>
    </tr>
    <tr>
    <td align="centre" colspan="3"><div align="center"><strong>&copy; Soumya Mondal 2010</strong></div></td>
  </tr>
    </table>
    </body>
</html>
