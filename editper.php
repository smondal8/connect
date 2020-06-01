<?php
session_start();
include_once 'serverconnect.inc';
//////////number of message//////////////////////////////////////
$query6 = "select count(serial) from message where user='".$_SESSION['user']."'";
$result6 = mysql_query($query6, $link);
$e  = mysql_fetch_row($result6);
///////////number of friends////////////////////////////////////

$query7 = "select count(user) from friend where user='".$_SESSION['user']."'";
$result7 = mysql_query($query7, $link);
$f  = mysql_fetch_row($result7);
//////////////////retrieve from user_info_personal/////////////

$query8 = "select * from user_info_personal where userid='".$_SESSION['currentuser']."'";
$res8 = mysql_query($query8, $link);
$i = mysql_fetch_row($res8);
?>
<html>
<head>
    <title>Profile</title>
    <script language="javascript" src="javascript_file/editper.js"></script>
</head>
<body>
<table id="tb" width="100%" border="0">
  <tr>
    <td colspan="3" ><?php include "head.inc"; ?></td>
  </tr>
  <tr>
    <td width="20 %" valign="top" height="100%"><?php include "left.inc";?></td>
    <td  valign="top"><table align="center" width="100%">
      
      <tr>
        <td><a href="remessage.php?user=<?php echo $_SESSION['user']; ?>" ><strong>Messages</strong></a><br/>

        <a href="" ><strong><?php echo $e[0]; ?></strong></a></td>
      </tr>
      <tr>
      <td>
           <table border="0" width="100%">
           <form action="applyper.php" method="post" name="frmper">
      <tr>
      <td colspan="4" align="center"> <h2>Edit Profile:</h2></td>
      </tr>       
      <tr>
          <td align="center"><a href="editacnt.php"><strong>Account Settings</strong></a></td>
          <td align="center"><a href="editgen.php"><strong>General</strong></a></td>
          <td align="center"><a ><strong>Personal</strong></a></td>
          <td align="center"><a href="editpro.php"><strong>Professional</strong></a></td>
      </tr>
      
      <tr>
      <td align="center" colspan="1">
        <strong>Change About Me:</strong> </td>
      <td colspan="2" align="center"><textarea name="abtme" id="abtme" cols="45" rows="5" disabled="disabled" value="soumya"><?php echo $i[1]; ?></textarea>
      </td>
      <td colspan="1" align="center">
      <input name="change" type="button" value="Change" onclick="about(this.form)">      </td>
      </tr>
      <tr>
      <td align="center" colspan="1">
        <strong>Change My Perfect Match:</strong> </td>
      <td colspan="2" align="center"><textarea name="pmatch" id="pmatch" cols="45" rows="5" disabled="disabled"><?php echo $i[2]; ?></textarea></td>
      <td colspan="1" align="center">
      
      </tr>
      <tr>
      <td align="center" colspan="1"><strong>Change My Best Feature:</strong></td>
      <td colspan="2" align="center"><textarea name="feature" id="feature" cols="45" rows="5" disabled="disabled"><?php echo $i[3]; ?></textarea></td>
      <td colspan="1" align="center">
      
      </tr>
      <tr>
      <td align="center" colspan="1">
        <p><strong>Change My Idea of A Perfect Date:</strong> </p>
        </td>
      <td colspan="2" align="center"><textarea name="date" id="date" cols="45" rows="5" disabled="disabled"><?php echo $i[4]; ?></textarea></td>
      <td colspan="1" align="center">
      
      </tr>
      <tr>
      <td align="center" colspan="1">
        <strong>Change My Five Things:</strong> </td>
      <td colspan="2" align="center"><textarea name="fivethings" id="fivethings" cols="45" rows="5" disabled="disabled"><?php echo $i[5]; ?></textarea></td>
      <td colspan="1" align="center">
      
      </tr>
      <tr>
      <td align="center" colspan="1">
        <p><strong>Change Extra Curricular Activities:</strong> </p>
        </td>
      <td colspan="2" align="center"><textarea name="extra" id="extra" cols="45" rows="5" disabled="disabled"><?php echo $i[6]; ?></textarea></td>
      <td colspan="1" align="center">
     
      </tr>
      <tr>
         <td colspan="2" align="center"><input name="chng2" type="submit" value="Apply Changes" disabled></td>
         <td colspan="2" align="center"><input name="chng" type="reset" value="Cancel"></td></tr>
      </form>
      </table>
      </td>
      </tr>
    </table>
      </td>
    <td width="25%" valign="top"><?php include "right.inc"; ?></td>
  </tr>
  <tr>
    <td align="centre" colspan="3"><div align="center"><strong>&copy; Soumya Mondal 2010</strong></div></td>
  </tr>
</table>

</body>
</html>
