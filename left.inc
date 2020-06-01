<?php
session_start();
///////////check wheather already friend or not///////
$querychk = "select user from friend where user='".$_SESSION['currentuser']."' AND friend='".$_SESSION['user']."'";
$reschk = mysql_query($querychk, $link);
$frnd = mysql_fetch_row($reschk);
if(isSet($_SESSION['user'])&& $_SESSION['user']==$_SESSION['currentuser'])
{
    $enable = "disabled=\"disabled\"";
    $enable1 = "href = \"editacnt.php\"";
}
else
{
    $enable = "href = \"addfrnd.php\"";
    $enable1 = "disabled=\"disabled\"";
}
if($frnd[0]!="" || $_SESSION['user']==$_SESSION['currentuser'])
{
    $enable = "disabled=\"disabled\"";
    $enable2 ="href=\"remessage.php?user=".$_SESSION['user']."\"";
}
else
{
    $enable2 = "disabled=\"disabled\"";
}
////////////retrieving data from user_info//////////////////////////////

$query1 = "select * from user_info where userid='".$_SESSION['user']."'";
$result1 = mysql_query($query1, $link);
$a  = mysql_fetch_row($result1);

///////////retrieving data from user_info_general///////////////////////////////

$query2 = "select * from user_info_general where userid='".$_SESSION['user']."'";
$result2 = mysql_query($query2, $link);
$b  = mysql_fetch_row($result2);


?>
<table width="200 px" border="0">
<tr>
  <td width="100%" height="100%"><img src="document images/user image/<?php echo $a[2] ?>" width="200 px" height="200 px"/></td>
</tr>
<tr>
<td><div align="center"><strong><?php echo $b[1];echo(" ");echo $b[2]; ?></strong> </div></td>
</tr>
<tr>
<td><div align="center"><strong><?php echo $b[7];?> , <?php echo $b[6];?></strong> </div></td>
</tr>
<tr>
<td><div align="center"><strong><?php echo $b[3];?>,<?php echo $b[4];?>  </strong></div></td>
</tr>
<tr><td><div align="center"><strong><?php echo $b[5];?></strong></div></td></tr>
<tr>
<td><div align="center"><a href="reprofile.php?user=<?php echo $_SESSION['user']; ?>" ><strong>Profile</strong></a></div></td>
</tr>
<tr>
<td><div align="center"><a <?php echo $enable2 ?>><strong>Message</strong></a></div></td>
</tr>
<tr>
<td><div align="center"><a href="Myfrndz.php" ><strong>Friends</strong></a></div></td>

</tr>
<tr>
<td><div align="center"><a <?php echo $enable; ?>><strong>Add as Friend</strong></a></div></td>
</tr>
<tr>
<td><div align="center"><a <?php echo $enable1; ?>><strong>Edit profile</strong></a></div></td>

</tr>
</table>
