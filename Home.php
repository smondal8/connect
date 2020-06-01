<?php

session_start();
include_once 'serverconnect.inc';
?>
<html>
<head>
    <title>Home</title>
    
</head>
<body>
<?php






//////////number of message//////////////////////////////////////
$query6 = "select count(id) from message where user='".$_SESSION['user']."'";
$result6 = mysql_query($query6, $link);
$e  = mysql_fetch_row($result6);
///////////number of friends////////////////////////////////////

$query7 = "select count(user) from friend where user='".$_SESSION['user']."'";
$result7 = mysql_query($query7, $link);
$f  = mysql_fetch_row($result7);



?>

<table id="tb" width="100%" border="0">
  <tr>
    <td colspan="3" ><?php include "head.inc"; ?></td>
  </tr>
  <tr>
    <td width="20 %" valign="top" height="100%"><?php include "left.inc";?></td>
    <td  valign="top"><table align="center" width="100%">
      <tr>
        <?php                 
        if(isSet($_SESSION['user'])&& $_SESSION['user']==$_SESSION['currentuser'])
        {
        echo "<td align=\"left\"><strong>Welcome,";
        echo $b[1];echo(" ");echo $b[2];
        }
        ?></strong></td>
      </tr>
      <tr>
        <td><a <?php echo $enable2 ?> ><strong>Messages</strong></a><br/>
      
        <a <?php echo $enable2 ?> ><strong><?php echo $e[0]; ?></strong></a></td>
      </tr>
      <tr>
      <td>
      <?php
     ///////////////////////friend request/////////////////////

        if(isSet($_SESSION['user'])&& $_SESSION['user']==$_SESSION['currentuser'])
            {
            ////////////retrieving data from friend_req///////////////////////////
            echo "<table><th colspan=\"4\"><h1>Friend Request :</h1></th>";
                $query3 = "select friend from friend_req where user='".$_SESSION['currentuser']."'";
                $result3 = mysql_query($query3, $link);
                while ($row = mysql_fetch_row($result3)) 
                {
                    ///////////////retrieving data from user_info///////
                    $query4 =" select image from user_info where userid='".$row[0]."'";
                    $query5 =" select first_name from user_info_general where userid='".$row[0]."'";
                    $result4 = mysql_query($query4, $link);
                    $result5 = mysql_query($query5, $link);
                    $c = mysql_fetch_row($result4);
                    $d = mysql_fetch_row($result5);
                    echo "<tr><form name=\"frm4\" action=\"frnreq.php\" method=\"POST\"><td><input type=\"hidden\" name=\"frnrq\" value=\"";
                    echo $row[0];
                    echo "\" /></td><td><img src=\"document images/user image/";
                    echo $c[0];
                    echo "\" width=\"50 px\" height=\" 50 px\"></td>
      <td>";
                    echo "<a href=\"rehome.php?user=";
                    echo $row[0];
                    echo "\"><strong>".$d[0]."</strong></a>";
                    echo " is friend?</td>
      <td><input name=\"sbmt\" type=\"submit\" value=\"Yes\"/></td><td><input name=\"sbmt\" type=\"submit\" value=\"No\"/></td></form></tr>";
                }              
                    echo "</table>";
            }

        ?>
      </td>
      </tr>
    </table></td>
    <td width="25%" valign="top"><?php include "right.inc"; ?></td>
  </tr>
  <tr>
    <td align="centre" colspan="3"><div align="center"><strong>&copy; Soumya Mondal 2010</strong></div></td>
  </tr>
</table>

</body>
</html>
