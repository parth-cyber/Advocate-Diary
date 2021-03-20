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
<form name=frm method=post action=clientcase2display.php>
<center>
<input type=submit name=sbm value=display>
</center>
</form>
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
echo "<th>SrNo</th>";
echo "<th>CCode</th>";
echo "<th>CaseNo</th>";
echo "<th>CourtName</th>";
echo "<th>CaseType</th>";
echo "<th>OpponentName</th>";
echo "<th>EventDescription</th>";
echo "<th>CaseSubmitDate</th>";
echo "<th>Stage</th>";
echo "<th>NextDate</th>";
echo "<th>PrevDate</th>";
echo "<th>ActCode</th>";
echo "<th>OpponentAdvName</th>";
echo "</tr>";
$sql="select * from clientcase";
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
echo "<td>$row[7]</td>";
echo "<td>$row[8]</td>";
echo "<td>$row[9]</td>";
echo "<td>$row[10]</td>";
echo "<td>$row[11]</td>";
echo "<td>$row[12]</td>";
echo "</tr>";
}
echo "</table>";
echo "<input type=button name=btn value=print onclick=show()>";
echo "</center>";
}
}
?>