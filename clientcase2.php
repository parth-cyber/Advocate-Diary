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
$e3="";
$e4="";
$f1=0;
if(isset($_POST['sbm']))
{
if(empty($_POST['sn']))
{
$e1="enter Serial Number";
$f1=1;
}
if(empty($_POST['cc']))
{
$e2="enter Client Code";
$f1=1;
}
if(empty($_POST['cn1']))
{
$e3="enter Court Name";
$f1=1;
}
if(empty($_POST['cd']))
{
$e4="enter Act Code";
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
<form name=frm method=post action=clientcase2.php>
<center>
<table>
<caption>Client Cases</caption>
<tr>
<td>Sr.No</td>
<td><input type=text name=sn onkeypress=valid1()><?php echo $e1; ?></td>
</tr> 
<tr>
<td>Client Code</td>
<td><input type=text name=cc onkeypress=valid1()><?php echo $e2; ?></td>
</tr>
<tr>
<td>Case No</td>
<td><input type=text name=cn onkeypress=valid1()></td>
</tr>
<tr>
<td>Court Name</td>
<td><input type=text name=cn1><?php echo $e3; ?></td>
</tr>
<tr>
<td>Case Type</td>
<td><input type=text name=ct></td>
</tr>
<tr>
<td>Opponent Name</td>
<td><input type=text name=on onkeypress=valid2()></td>
</tr>
<tr>
<td>Event Description</td>
<td><input type=text name=ed></td>
</tr>
<tr>
<td>Case Submit Date</td>
<td><input type=text name=csd></td>
</tr>
<tr>
<td>Stage</td>
<td><input type=text name=stg></td>
</tr>
<tr>
<td>Next Date</td>
<td><input type=text name=nd value=<?php echo $dt; ?>></td>
</tr>
<tr>
<td>Prev. Date</td>
<td><input type=text name=pd value=<?php echo $dt; ?>></td>
</tr>
<tr>
<td>Act Code</td>
<td><input type=text name=cd onkeypress=valid1()><?php echo $e4 ?></td>
</tr>
<tr>
<td>Opponent Adv. Name</td>
<td><input type=text name=oan onkeypress=valid2()></td>
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
$sql="insert into clientcase values('$_POST[sn]','$_POST[cc]','$_POST[cn]','$_POST[cn1]','$_POST[ct]','$_POST[on]','$_POST[ed]','$_POST[csd]','$_POST[stg]','$_POST[nd]','$_POST[pd]','$_POST[cd]','$_POST[oan]')";
mysql_query($sql,$cn);
echo "record saved";
}
}
else
if($sb=="update")
{
$sql="update clientcase set CCode='$_POST[cc]' , CaseNo='$_POST[cn]' , CourtName='$_POST[cn1]' , CaseType='$_POST[ct]' , OpponentName='$_POST[on]' , EventDescription='$_POST[ed]' , CaseSubmitDate='$_POST[csd]' , Stage='$_POST[stg]' , NextDate='$_POST[nd]' , PrevDate='$_POST[pd]' , ActCode='$_POST[cd]' , OpponentAdvName='$_POST[oan]' where SrNo='$_POST[sn]' ";
mysql_query($sql,$cn);
echo "record updated";
}
else
if($sb=="delete")
{
$sql="delete from clientcase where SrNo='$_POST[sn]' ";
mysql_query($sql,$cn);
echo "record deleted";
}
else
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
echo "</table></center>";
}
else
if($sb=="search")
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
$sql="select * from clientcase where SrNo='$_POST[sn]' ";
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
echo "</table></center>";
}
}
?>
</div>