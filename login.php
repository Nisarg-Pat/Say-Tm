<?php
include("conn.php");
session_start();
if(isset($_REQUEST["login"]))
{

	$unm=$_REQUEST["unm"];
	$pass=$_REQUEST["pass"];

	$lgn="select * from user_info where unm='$unm' AND pass='$pass'";
	$res=$conn->query($lgn);
	$chk=$res->num_rows;


	if($chk==1){
		//echo "insert success";
		//header('location:show.php');
		$_SESSION["user"]=$unm;
		?>
		<script type="text/javascript">
			window.location="page.php";
		</script>
		<?php
	}
	else
	{
		?>
		<script type="text/javascript">
			alert("Login not success");
			window.location="login.php";
		</script>
		<?php
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="SayTM.png" type="image/gif" sizes="16x16">
	<title>Login Page</title>
</head>
<body>
<div class="men">
 <?php include 'navbar.php'; ?>
 </div>
    <br>
    <br>
    <div style="text-align: center;color: black;font-size: 20px">Login Here</div>
    <hr>
<form action="" method="POST">
	<table align="center" style=";border-radius: 10px; background: -webkit-linear-gradient(left,#85C1E9, #D6EAF8);" >
		<tr>
			<td style="padding: 10px;color: black">Username : </td>
			<td style="padding: 10px"><input type="text" name="unm"></td>
		</tr>
		<tr>
			<td style="padding: 10px;color: black">Password : </td>
			<td style="padding: 10px"><input type="Password" name="pass"></td>
		</tr>
		<tr align="center">
		<td></td>
			<td style="padding: 10px"><input type="submit" name="login" value="Sign In" style="border-radius: 5px;color:black; border-color: black; width: 80px;height: 40px;background-color: #D6EAF8"></td>
		</tr>		
	</table>
</form>
<hr>
</body>
</html>