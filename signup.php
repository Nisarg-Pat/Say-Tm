<?php
include("conn.php");
session_start();
if(isset($_REQUEST["submit"]))
{

	$naam=$_REQUEST["naam"];
	$eml=$_REQUEST["eml"];
	$unm=$_REQUEST["unm"];
	$pass=$_REQUEST["pass"];
	$mno=$_REQUEST["mobile"];

	$sq="insert into user_info (name,email,mobile,unm,pass,emoney) values ('$naam','$eml',$mno,'$unm','$pass',30)";
	$res=$conn->query($sq);
	$sq1="select * from user_info where email='$eml'";
	$reseml=$conn->query($sq1);
	$rows1=$reseml->num_rows;
	$sq2="select * from user_info where unm='$unm'";
	$resunm=$conn->query($sq2);
	$rows2=$resunm->num_rows;

	if($res){
		//echo "insert success";
		//header('location:show.php');
		?>
		<script type="text/javascript">
			alert("Sign Up Successfull");
			<?php $_SESSION["user"]=$unm; ?>
			window.location="page.php";
		</script>
		<?php
	}	
	/*else
	{
		?>
		<script type="text/javascript">
			alert("Sign Up not Successfull. Try using different Email Id or Username");
			//window.location="login.php";
		</script>
		<?php
	}*/

	elseif($rows1)
	{
		?>
		<script type="text/javascript">
			alert("This Email Id already has an account.");
			window.location="signup.php";
		</script>
		<?php
	}
	elseif($rows2)
	{
		?>
		<script type="text/javascript">
			alert("This Username is already taken.");
			window.location="signup.php";
		</script>
		<?php
	}
	else
	{
		?>
		<script type="text/javascript">
			alert("Sign Up not Successfull!!! Try Again.");
			window.location="signup.php";
		</script>
		<?php
	}
	
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="SayTM.png" type="image/gif" sizes="16x16">
	<title>Sign Up Page</title>
</head>
<body>
 <?php include("navbar.php"); ?>
    <br>
    <br>
    <div style="text-align: center;color: black;font-size: 20px">Sign Up here for new account</div>
    <hr>

<form action="" method="POST">
	<table align="center" style=";border-radius: 10px; background: -webkit-linear-gradient(left,#85C1E9, #D6EAF8);" >
	<tr>
		<td style="padding: 10px;color: black">Name</td>
		<td style="padding: 10px;color: black"><input type="text" name="naam"></td>
	</tr>
	<tr>
		<td style="padding: 10px;color: black">Email Id</td>
		<td style="padding: 10px;color: black"><input type="text" name="eml"></td>
	</tr>
	<tr>
		<td style="padding: 10px;color: black">Mobile Number</td>
		<td style="padding: 10px;color: black"><input type="text" name="mobile"></td>
	</tr>
		<tr>
			<td style="padding: 10px;color: black">Username</td>
			<td style="padding: 10px;color: black"><input type="text" name="unm"></td>
		</tr>
		<tr>
			<td style="padding: 10px;color: black">Password</td>
			<td style="padding: 10px;color: black"><input type="Password" name="pass"></td>
		</tr>
		<tr align="center">
		<td style="padding: 10px;color: black"></td>
		<td style="padding: 10px"><input type="submit" name="submit" value="Submit" style="border-radius: 5px;color:black; border-color: black; width: 80px;height: 40px;background-color: #D6EAF8"></td>
		</tr>		
	</table>
</form>
<hr>
</body>
</html>