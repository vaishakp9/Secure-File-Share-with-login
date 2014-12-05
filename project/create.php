<?php

$userreg=$_POST["user"];
$passreg=$_POST["pass"];
$taken="false";
$database="a4820195_databas";
$password="TOFFEEeclairs9$";
$user="a4820195_vaishak";
if($userreg&&$passreg){
	$con=mysql_connect("mysql6.000webhost.com",$user,$password);
	@mysql_select_db($database, $con) or ("Database Error");
	mysql_query("INSERT INTO `users` VALUES('','$userreg','$passreg')") or die("Unexpected error, please try again.");

	echo "Account created.";
	mysql_close($con);

	header("location: index.html"); 




}
else echo "You need to enter both a username and password";


?>