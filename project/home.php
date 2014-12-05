 <?php
setcookie("test", 0, time()-(60*60*24*7));

if(isset($_COOKIE['test']))
{
    echo "<font color='white'>Welcome to Ashwa, " . $_COOKIE['test'] . " !<br></font>";
}
else
header("Location: Fail.php");
?>
<html>
<style>
body {background-image:url('bgedited.jpg');
background-repeat:no-repeat;
  background-size: 100%;}

</style>

<div align = "center">
<title>AshwaPortal</title>
<font color="white">
 
</div>
<div align = "right">
<form action="index.html">
	<input type= "Submit" value ="Log out"></input>
</form>
</div>
</html>