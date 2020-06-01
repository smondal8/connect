<?php
session_start();
include_once 'serverconnect.inc';
$query_pro = "select * from user_info_pro where userid='".$_SESSION['user']."'";
$res_pro = mysql_query($query_pro, $link);
$r = mysql_fetch_row($res_pro);
sleep(2);
?>
<table align="center" width="100%">
<tr>
  <td><strong>Degrees I already Have:</strong></td>
  <td><?php echo $r[1] ?></td>
</tr>
<tr>
  <td><strong>Skills I acquired:</strong></td>
  <td><?php echo $r[2] ?></td>
</tr>
<tr>
<td><strong>Dream of My life:</strong></td>
<td><?php echo $r[3] ?></td>
</tr>
<tr>
  <td><strong>After 10 Years I like to see me as:</strong></td>
  <td><?php echo $r[4] ?></td>
</tr>
<tr>
  <td><strong>Subjects:</strong></td>
  <td><?php echo $r[5] ?></td>
</tr>
</table>
