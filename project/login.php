<?php
$inputuser = $_POST["user"];
$inputpass = $_POST["pass"];
$user = "a4820195_vaishak";
$password = "TOFFEEeclairs9$";
$dbb = "a4820195_databas";
setcookie("test",$inputuser,time()+60,'/');
$connect = mysql_connect("mysql6.000webhost.com",$user,$password);
@mysql_select_db($dbb) or ("Database Error");
$query = "SELECT * FROM `users` WHERE `user` = '$inputuser'";
$querypass = "SELECT * FROM `users` WHERE `password` = '$inputpass'";
$result = mysql_query($query);
$resultpass = mysql_query($querypass);
$row = mysql_fetch_array($result);
$rowpass = mysql_fetch_array($resultpass);
$serveruser = $row["user"];
$serverpass = $row["password"];

if($serveruser&&$serverpass){

	if(!$result)
		{
			header('Location: Fail.php');
		}
	//echo "<br><center>Database Output</b></center><br><br>";
	mysql_close();
	//echo $inputpass;
	//echo $serverpass;
	if($inputpass == $serverpass)
		{
			header('Location: home.php');
		}
	else {
		
		header('Location: Fail.php');
         }

}
else
	header('Location: Fail.php');
?>