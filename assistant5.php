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
$e2="";
$f1=0;
if(isset($_POST['sbm']))
{
if(empty($_POST['as']))
{
$e1="enter Argument Code";
$f1=1;
}
if(empty($_POST['mn']))
{
$e2="enter Mobile Number";
$f1=1;
}
}
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
function valid2()
{
var x;
x=event.keyCode;
if((x>=65 && x<=90) || (x>=97 && x<=122) || x==32)
x=event.keyCode;
else
x=event.keyCode=0;
}

</script>
</head>
<body>
<form name=frm method=post action=assistant5.php>
<center>
<table>
<caption>Assistant</caption>
<tr>
<td>Assistant Code</td>
<td><input type=text name=as onkeypress=valid1()><?php echo $e1; ?></td>
</tr>
<tr>
<td>Name</td>
<td><input type=text name=nm onkeypress=valid2()></td>
</tr>
<tr>
<td>Address</td>
<td><input type=text name=adr></td>
</tr>
<tr>
<td>Gender</td>
<td><input type=radio name=gnd value=male>Male</td>
<td><input type=radio name=gnd value=female>Female</td>
</tr>
<tr>
<td>Mobile No</td>
<td><input type=text name=mn onkeypress=valid1()><?php echo $e2; ?></td>
</tr>
<tr>
<td>Alternate Mob. No</td>
<td><input type=text name=amn onkeypress=valid1()></td>
</tr>
<tr>
<td>Email ID</td>
<td><input type=text name=ei></td>
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
$sql="insert into assistant values('$_POST[as]','$_POST[nm]','$_POST[adr]','$_POST[gnd]','$_POST[mn]','$_POST[amn]','$_POST[ei]')";
mysql_query($sql,$cn);
echo "record saved";
}
}
else
if($sb=="update")
{
$sql="upadate assistant set Name='$_POST[nm]',Address='$_POST[adr]',Gender='$_POST[gnd]',MobNo='$_POST[mn]',AlternateNo='$_POST[amn]',Emailid='$_POST[ei]' ";
mysql_query($sql,$cn);
echo "record updated";
}
else
if($sb=="delete")
{
$sql="delete from assistant where AssistantCode='$_POST[as]' ";
mysql_query($sql,$cn);
echo "record deleted";
}
else
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
echo "</table></center>";
}
else
if($sb=="search")
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
$sql="select * from assistant where AssistantCode='$_POST[as]' ";
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
echo "</table></center>";
}
}
?>
</div>