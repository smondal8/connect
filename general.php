<?php
session_start();
include_once 'serverconnect.inc';
$query_gen = "select * from user_info_general where userid='".$_SESSION['user']."'";
$res_gen = mysql_query($query_gen, $link);
$r = mysql_fetch_row($res_gen);
sleep(2);
$bdy = <<<BODY
<table align="center" width="100%">
<tr><td><strong>First Name:</strong></td><td>$r[1]</td>
</tr>
<tr><td><strong>Last Name:</strong></td><td>$r[2]</td></tr>
<tr>
<td><strong>City:</strong></td><td>$r[3]</td>
</tr>
<tr><td><strong>State:</strong></td><td>$r[4]</td>
</tr>
<tr><td><strong>Country:</strong></td><td>$r[5]</td>
</tr>
<tr>
  <td><strong>Relationship Status:</strong></td>
  <td>$r[6]</td>
</tr>

<tr><td><strong>Sex:</strong></td><td>$r[7]</td>
</tr>
<tr><td><strong>Date of Birth:</strong></td><td>$r[8]</td>
</tr>
</table>
BODY;
echo $bdy;
?>
