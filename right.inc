<table width="100%" border="0" height="100%">
<tr><td valign="top"><strong>My Friend (<?php echo $f[0]; ?>)</strong></td>
</tr>
<tr><td valign="top">
<table width="100%" valign="top">
<?php
//////////////////////////populating friend list/////////////////////////
$i = 3;
$query8 = "select friend from friend where user='".$_SESSION['user']."'";
                $result8 = mysql_query($query8, $link);
                echo "<tr>";
                while ($row1 = mysql_fetch_row($result8))
                {
                    ///////////////retrieving data from user_info///////
                    $query9 =" select image from user_info where userid='".$row1[0]."'";
                    $query10 =" select first_name from user_info_general where userid='".$row1[0]."'";
                    $result9 = mysql_query($query9, $link);
                    $result10 = mysql_query($query10, $link);
                    $g = mysql_fetch_row($result9);
                    $h = mysql_fetch_row($result10);
                    
                    if($i%3==0)
                    {
                       echo "</tr><tr><td><input name=\"img1\" type=\"image\" src=\"document images/user image/";
                       echo $g[0];
                       echo "\" height=\"50 px\" width=\"50 px\"/><br /><a href=\"rehome.php?user=".$row1[0];
                       echo "\" >";
                       echo $h[0];
                       echo "</a></td>" ;
                       $i++;
                    }
                    else
                    {
                       echo "<td><input name=\"img1\" type=\"image\" src=\"document images/user image/";
                       echo $g[0];
                       echo "\" height=\"50 px\" width=\"50 px\"/><br /><a href=\"rehome.php?user=".$row1[0];
                        echo "\" >";
                       echo $h[0];
                       echo "</a></td>";
                       $i++;
                    }
                }
                
?>
</table>
</td></tr>
<tr><td><div align="center"><a href="Myfrndz.php"><strong>View all Friends:</strong></a></div></td>
</tr>
</table>