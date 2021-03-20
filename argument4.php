<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Blend by Free CSS Templates</title>
<meta name="keywords" content="" />
<meta name="Blend" content="" />
<link href="default.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<!-- start header -->
<div id="header">
	<div id="logo">
		<h1><a href="#">advocate diary</a></h1>
		     <p>Designed By Parth Kulkarni</p>
	</div>
	<div id="menu">
		<ul id="main">
			<li><a href="index.html">Home</a></li>
			<li><a href="indianact1.php">Indian Act</a></li>
			<li><a href="clientcase2.php">Client Case</a></li>
			<li><a href="clientinformation3.php">Client Information</a></li>
			<li><a href="argument4.php">Argument</a></li>
            <li><a href="assistant5.php">Assistant</a></li>
		</ul>
		
	</div>
	
</div>
<div id="page">
<?php
$e1="";
$f1=0;
if(isset($_POST['sbm']))
{
if(empty($_POST['sn']))
{
$e1="enter Serial Number";
$f1=1;
}
}
$dt=date('Y-m-d');
?>
<html>
<head>
<script language=javascript>
function valid1()
{
var x;
x=event.keyCode;
if(x>=48 && x<=57)
x=event.keyCode;
else
x=event.keyCode=0;
}
</script>
</head>
<body>
<form name=frm method=post action=argument4.php>
<center>
<table>
<caption>Argument</caption>
 <tr>
<td>Sr.No</td>
<td><input type=text name=sn onkeypress=valid1()><?php echo $e1; ?></td>
 </tr>
  <tr>
<td>Case No</td>
<td><input type=text name=cn onkeypress=valid1()></td>
  </tr>
 <tr>
<td>Date</td>
<td><input type=text name=dt value=<?php echo $dt ?>></td>
 </tr>
<tr>
<td>Description</td>
<td><input type=text name=desc></td>
</tr>
<tr>
<td>Next Date</td>
<td><input type=text name=nd value=<?php echo $dt ?>></td>
</tr>
<tr>
<td>Assistant Code</td>
<td><input type=text name=ac onkeypress=valid1()></td>
</tr>
</table>
<input type=submit name=sbm value=save>
<input type=submit name=sbm value=update>
<input type=submit name=sbm value=delete>
<input type=submit name=sbm value=search>
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
if($sb=="save")
{
if($f1==0)
{
$sql="insert into argument values('$_POST[sn]','$_POST[cn]','$_POST[dt]','$_POST[desc]','$_POST[nd]','$_POST[ac]')";
mysql_query($sql,$cn);
echo "record saved";
}
}
else
if($sb=="update")
{
$sql="update argument set CaseNo='$_POST[cn]', Date='$_POST[dt]',Description='$_POST[desc]',NextDate='$_POST[nd]',AssistantCode='$_POST[ac]' where SrNo='$_POST[sn]' ";
mysql_query($sql,$cn);
echo "record updated";
}
else
if($sb=="delete")
{
$sql="delete from argument where SrNo='$_POST[sn]' ";
mysql_query($sql,$cn);
echo "record deleted";
}
else
if($sb=="display")
{
echo "<center><table border=2>";
echo "<tr>";
echo "<th>SrNo</th>";
echo "<th>CaseNo</th>";
echo "<th>Date</th>";
echo "<th>Description</th>";
echo "<th>NextDate</th>";
echo "<th>AssistantCode</th>";
echo "</tr>";
$sql="select * from argument";
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
echo "</tr>";
}
echo "</table></center>";
}
else
if($sb=="search")
{
echo "<center><table border=2>";
echo "<tr>";
echo "<th>SrNo</th>";
echo "<th>CaseNo</th>";
echo "<th>Date</th>";
echo "<th>Description</th>";
echo "<th>NextDate</th>";
echo "<th>AssistantCode</th>";
echo "</tr>";
$sql="select * from argument where SrNo='$_POST[sn]' ";
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
echo "</tr>";
}
echo "</table></center>";
}
}
?>
</div>