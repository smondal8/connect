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
///////////////////retrieve data from user_info/////////////////////

$query8 = "select email from user_info where userid='".$_SESSION['currentuser']."'";
$result8 = mysql_query($query8, $link);
$g = mysql_fetch_row($result8);
//echo $g[1];
?>
<html>
<head>
    <title>Profile</title>
    <script language="javascript" src="javascript_file/editacnt.js"></script>
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
      <form name="frm" action="applyacnt.php" enctype="multipart/form-data" method="POST">
      <tr>
      <td colspan="4" align="center"> <h2>Edit Profile:</h2></td>
      </tr>       
      <tr>
          <td align="center"><a ><strong>Account Settings</strong></a></td>
          <td align="center"><a href="editgen.php"><strong>General</strong></a></td>
          <td align="center"><a href="editper.php"><strong>Personal</strong></a></td>
          <td align="center"><a href="editpro.php"><strong>Professional</strong></a></td>
      </tr>
      <tr>
      <td align="center" colspan="1">
        <strong>Change Password:</strong> </td>
      <td colspan="2" align="center">
      <input name="pass" type="password" disabled size="20" value="">      </td>
      <td colspan="1" align="center">
      <input name="change" type="button" value="Change" onClick="passwd(this.form)">      </td>
      </tr>
      <tr>
      <td align="center" colspan="1">
        <strong>Change Profile Image:</strong> </td>
      <td colspan="2" align="center"><input type="file" name="imag1" id="imga1" disabled></td>
      <td colspan="1" align="center">
            </td>
      </tr>
      <tr>
      <td align="center" colspan="1">
        <strong>Change Email:</strong> </td>
      <td colspan="2" align="center">
      <input name="email" type="text" disabled size="20" value="<?php echo $g[0]; ?>">      </td>
      <td colspan="1" align="center">
            </td>
      </tr>
      
       <tr>
         <td colspan="2" align="center"><input name="chng2" type="submit" value="Apply Changes" disabled></td>
         <td colspan="2" align="center"><input name="chng" type="reset" value="Cancel"></td></tr>
  		</form>
      </table>
      </td>
      </tr>
    </table></td>
    <td width="25%" valign="top"><?php include "right.inc"; ?></td>
  </tr>
 
    <td align="centre" colspan="3"><div align="center"><strong>&copy; Soumya Mondal 2010</strong></div></td>
  </tr>
</table>

</body>
</html>
