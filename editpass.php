
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="SayTM.png" type="image/gif" sizes="16x16">
	<title>Edit Password Page</title>
</head>
<body>
<?php
include "navbar2.php";
?>
<br>
    <br>
    <div style="text-align: center;color: black;font-size: 40px">Edit Password</div>
    <hr>
    <center>
    <h2>Username : <?php echo $fe->unm; ?></h1><hr>
    </center>
<form action="" method="POST">
	<table align="center" style=";border-radius: 10px; background: -webkit-linear-gradient(left,#85C1E9, #D6EAF8);">
		<tr>
			<td style="padding: 10px;color: black;">Enter current Password : </td>
			<td style="padding: 10px"><input type="Password" name="pass"></td>
		</tr>
		<tr>
			<td style="padding: 10px;color: black;">Enter new Password : </td>
			<td style="padding: 10px"><input type="Password" name="newpass"></td>
		</tr>
		<tr align="center">
		<td></td>
			<td style="padding: 10px"><input type="submit" name="update" value="Edit" style="border-radius: 5px;color:black; border-color: black; width: 80px;height: 40px;background-color: #D6EAF8"></td>
		</tr>		
	</table>
</form>
<hr>
</body>
</html>

<?php
if(isset($_REQUEST["update"]))
{
	$p=$_REQUEST["pass"];
	$np=$_REQUEST["newpass"];


	if($p==$np)
	{
		?>
			<script type="text/javascript">
				alert("The new password and old password could not be same.");
				window.location="editpass.php";
			</script>
		<?php
	}
	else if($p!=$fe->pass)
	{
		?>
			<script type="text/javascript">
				alert("The current password is not correct");
				window.location="editpass.php";
			</script>
			<?php	
	}
	else
	{
		$up="update user_info set pass='$np' where id=$fe->id";
		$res_up=$conn->query($up);

		if($res_up)
		{
			?>
			<script type="text/javascript">
				alert("Update success");
				window.location="page.php";
			</script>
			<?php
		}
		else
		{
			?>
			<script type="text/javascript">
				alert("Update not success");
				window.location="page.php";
			</script>
			<?php
		}
	}
}

?>