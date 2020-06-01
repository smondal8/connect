<?php
session_start();
include_once 'serverconnect.inc';

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Message</title>
</head>
    <body>
  <table width="100%" border="0">
  <tr>
    <td colspan="2"><?php include("head.inc"); ?> </td>
    
  </tr>
  <tr>
    <td width="15%" valign="top"><?php include("left.inc"); ?></td>
    <td width="85%" valign="top">
    <table width="100%" border="0">
    <form name="frm" action="post.php" method="post">
    <tr>
      <td align="center"><textarea name="message" cols="75" style="background-color:#FFCCFF"></textarea></td>
    </tr>
    <tr>
    
    <td align="center"><input name="post" type="submit" value="Post"></td>
    </form></tr>
    <?php
    //////////number of message//////////////////////////////////////
        $query11 = "select count(id) from message where user='".$_SESSION['user']."'";
        $result11 = mysql_query($query11, $link);
        $m  = mysql_fetch_row($result11);
    ?>
    <tr><td align="center"><strong><?php echo $_SESSION['user'] ?>'s MessageBox(<?php echo $m[0]; ?>)</strong></td>
    </tr>
    <tr><td>
   <table width="100%" border="0">
   
  <?php
  ///////////////////////////retrieve messages//////////////////////
  $query1 = "SELECT * FROM message WHERE user = '".$_GET['user']."' ORDER BY id DESC";
  $result1 = mysql_query($query1, $link);
  while ($row = mysql_fetch_row($result1))
  {

  /////////////////////////retrieve image///////////////////
      $query9 = "select image from user_info where userid='".$row[2]."'";
      $result9 = mysql_query($query9, $link);
      $k  = mysql_fetch_row($result9);
/////////////////////////retrive name//////////////////////////////
      $query10 = "select first_name from user_info_general where userid='".$row[2]."'";
      $result10 = mysql_query($query10, $link);
      $l  = mysql_fetch_row($result10);

      ///////////////////create row/////////////////////////
      echo "<form action=\"delete_message.php\" method=\"post\" name=\"frm1\">";
      echo("<tr><td width=\"10%\"><img src=\"document images/user image/");
      echo $k[0];
      echo "\" width=\"50 px\" height=\"50 px\"></td><td><a href=\"rehome.php?user=".$row[2];
      echo "\">";
      echo $l[0];
      echo "</a><br/><label>";
      echo $row[3];
      echo "</label></td><td>";
      echo $row[4];
      echo "</td><td>";
      if(isSet($_SESSION['user'])&& $_SESSION['user']==$_SESSION['currentuser']||$_SESSION['currentuser']==$row[2])
      echo "<input name=\"del\" type=\"submit\" value=\"Delete\">";
      echo "<input type=\"hidden\" name=\"id\" value=\"";
      echo $row[0];
      echo "\" />";
      echo "  </form>";
      echo "</td></tr>";
  }
  ?>
</table>

    </td></tr>
    <tr><td><div align="center"><a href="">>>NEXT</a></div></td></tr>
    <tr></tr>
    </table>    
    </td>
  </tr>
  <tr>
    <td colspan="2"><div align="center"><strong>© Soumya Mondal 2010</strong></div></td>    
  </tr>
</table>

    </body>
</html>
