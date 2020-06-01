<?php
session_start();
include_once 'serverconnect.inc';
$query_per = "select * from user_info_personal where userid='".$_SESSION['user']."'";
$res_per = mysql_query($query_per, $link);
$r = mysql_fetch_row($res_per);
sleep(2);
?>
<table align="center" width="100%">
<tr>
  <td><strong>About Me:</strong></td>
  <td><?php echo $r[1] ?></td>
</tr>
<tr>
  <td><strong>My Perfect Match:</strong></td>
  <td><?php echo $r[2] ?></td>
</tr>
<tr>
<td><strong>My Best Feature:</strong></td>
<td><?php echo $r[3] ?></td>
</tr>
<tr>
  <td><strong>Idea of A Perfect Date:</strong></td>
  <td><?php echo $r[4] ?></td>
</tr>
<tr>
  <td><strong>Five Things You Will Notice In Me:</strong></td>
  <td><?php echo $r[5] ?></td>
</tr>
<tr>
  <td><strong>Extracurricular Activity:</strong></td>
  <td><?php echo $r[6] ?></td>
</tr>
</table>
