<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
////////////retrieving data from user_info//////////////////////////////

$query1 = "select * from user_info where userid='".$_SESSION['currentuser']."'";
$result1 = mysql_query($query1, $link);
$a  = mysql_fetch_row($result1);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>
<style type="text/css">
<!--
.style1 {
	font-size: x-large;
	font-weight: bold;
}
-->
</style>
<script language="javascript" src="javascript_file/search.js"></script>
</head>
<body>
<table align="center" width="100%"><tr>
<td align="center" width="100%" colspan="8"><img src="document images/system image/ist2_3953171-unity-and-strength.jpg" width="100%" height="100 px"/></td>
</tr>
<tr><td><a href="rehome.php?user=<?php echo $_SESSION['currentuser']; ?>" >Home</a></td>
<td><a href="reprofile.php?user=<?php echo $_SESSION['currentuser']; ?>" >Profile</a></td>
<td><a href="remessage.php?user=<?php echo $_SESSION['currentuser']; ?>" >Messages</a></td>
<td><a href="refrnd.php" >Friends</a></td>
<td><div align="center" class="style1"><?php echo $a[3] ?></div></td>
<td><a href="logout.php" >Logout</a></td>
<td align="center"><form name="frm8" action="uni_search.php" method="POST" enctype="multipart/form-data">
<input name="search" type="text" value="Search Friends" size="25" onclick="blank(this.form)" onblur="rewrte(this.form)"/></td>
<td><input name="srch" type="submit" value="Search Friend" src="document images/system image/search.jpg" height="50%" width="50%"/></td></form>
</tr>
</table>

