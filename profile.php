<?php
session_start();
include_once 'serverconnect.inc';
//////////number of message//////////////////////////////////////
$query6 = "select count(id) from message where user='".$_SESSION['user']."'";
$result6 = mysql_query($query6, $link);
$e  = mysql_fetch_row($result6);

///////////number of friends////////////////////////////////////

$query7 = "select count(user) from friend where user='".$_SESSION['user']."'";
$result7 = mysql_query($query7, $link);
$f  = mysql_fetch_row($result7);
?>
<html>
<head>
    <title>Profile</title>
    <script src="javascript_file/profile.js"></script>
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
      <tr>
      <td colspan="3" align="center"> <h2>Profile Information:</h2></td>
      </tr>       
      <tr>
          <td align="center"><input type="button" value="General" name="gen" onClick="gen()"/></td><td align="center"><input type="button" value="Personal" name="per" onClick="per()"/></td><td align="center"><input type="button" value="Professional" name="pro" onClick="pro()"/></td>
      </tr>
      <tr>
      <td align="center" colspan="3">
      <div id="load"></div>
      </td>
      </tr>
      <tr>
      <td colspan="3" align="center">
      <div id="body"></div>
      </td>
      </tr>
      </table>
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
