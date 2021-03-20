<html>
<head>
<script language=javascript>
function show()
{
window.print();
}
</script>
</head>
<body>
<form name=frm method=post action=assistant5display.php>
<center>
<input type=submit name=sbm value=display>
</center>
</body>
</html>
<?php
$cn=mysql_connect("localhost","root");
mysql_select_db("advocate",$cn);
if(isset($_POST['sbm']))
{
$sb=$_POST['sbm'];

if($sb=="display")
{
echo "<center><table border=2>";
echo "<tr>";
echo "<th>AssistantCode</th>";
echo "<th>Name</th>";
echo "<th>Address</th>";
echo "<th>Gender</th>";
echo "<th>MobNo</th>";
echo "<th>AlternateNo</th>";
echo "<th>Emailid</th>";
echo "</tr>";
$sql="select * from assistant";
$result=mysql_query($sql,$cn);
while($row=mysql_fetch_array($result))
{
echo "<tr>";
echo "<td>$row[0]</td>";
echo "<td>$row[1]</td>";
echo "<td>$row[2]</td>";
echo "<td>$row[3]</td>";
echo "<td>$row[4]</td>";
echo "<td>$row[5]</td>";
echo "<td>$row[6]</td>";
echo "</tr>";
}
echo "</table>";
echo "<input type=button name=btn value=print onclick=show()>";
echo "</center>";
}
}
?>