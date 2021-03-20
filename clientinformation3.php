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
if(empty($_POST['cc']))
{
$e1="enter Client Code";
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
<form name=frm method=post action=clientinformation3.php>
<center>
<table>
<caption>Client Information</caption>
<tr>
<td>Client Code</td>
<td><input type=text name=cc onkeypress=valid1()><?php echo $e1; ?></td>
</tr>
<tr>
<td>Client name</td>
<td><input type=text name=cn onkeypress=valid2()></td>
</tr>
<tr>
<td>Client Address</td>
<td><input type=text name=ca></td>
</tr>
<tr>
<td>City</td>
<td><input type=text name=cty></td>
</tr>
<tr>
<td>Mob. No</td>
<td><input type=text name=mn onkeypress=valid1()><?php echo $e2; ?></td>
</tr>
<tr>
<td>Email ID</td>
<td><input type=text name=ei></td>
</tr>
<tr>
<td>Gender</td>
<td><input type=radio name=gnd value=male>Male</td>
<td><input type=radio name=gnd value=female>Female</td>
</tr>
<tr>
<td>Caste</td>
<td><select name=cs>
<option value=Open>Open</option>
<option value=Obc>Obc</option>
<option value=St>St</option>
<option value=Sc>Sc</option></td>
</tr>
<tr>
<td>Age</td>
<td><input type=text name=ag></td>
</tr>
<tr>
<td>Alternate No</td>
<td><input type=text name=an onkeypress=valid1()></td>
</tr>
<tr>
<td>Stge of case</td>
<td><input type=text name=soc onkeypress=valid1()></td>
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
$sql="insert into clientinformation values('$_POST[cc]','$_POST[cn]','$_POST[ca]','$_POST[cty]','$_POST[mn]','$_POST[ei]','$_POST[gnd]','$_POST[cs]','$_POST[ag]','$_POST[an]','$_POST[soc]')";
mysql_query($sql,$cn);
echo "record saved";
}
}
else
if($sb=="update")
{
$sql="update clientinformation set Cname='$_POST[cn]' , Address='$_POST[ca]' , City='$_POST[cty]' , MobNo='$_POST[mn]' , Emailid='$_POST[ei]' , Gender='$_POST[gnd]' , Caste='$_POST[cs]' , Age='$_POST[ag]' , AlternateNo='$_POST[an]','StageOfCase='$_POST[soc]' where CCode='$_POST[cc]' ";
mysql_query($sql,$cn);
echo "record updated";
}
else
if($sb=="delete")
{
$sql="delete from clientinformation where CCode='$_POST[cc]' ";
mysql_query($sql,$cn);
echo "record deleted";
}
else
if($sb=="display")
{
echo "<center><table border=2>";
echo "<tr>";
echo "<th>CCode</th>";
echo "<th>Cname</th>";
echo "<th>Address</th>";
echo "<th>City</th>";
echo "<th>MobNo</th>";
echo "<th>Emailid</th>";
echo "<th>Gender</th>";
echo "<th>Caste</th>";
echo "<th>Age</th>";
echo "<th>AlternateNo</th>";
echo "<th>StageOfCcase</th>";
echo "</tr>";
$sql="select * from clientinformation";
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
echo "</tr>";
}
echo "</table></center>";
}
else
if($sb=="search")
{
echo "<center><table border=2>";
echo "<tr>";
echo "<th>CCode</th>";
echo "<th>Cname</th>";
echo "<th>Address</th>";
echo "<th>City</th>";
echo "<th>MobNo</th>";
echo "<th>Emailid</th>";
echo "<th>Gender</th>";
echo "<th>Caste</th>";
echo "<th>Age</th>";
echo "<th>AlternateNo</th>";
echo "<th>StageOfCase</th>";
echo "</tr>";
$sql="select * from clientinformation where CCode='$_POST[cc]' ";
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
echo "</tr>";
}
echo "</table></center>";
}
}
?>
</div>