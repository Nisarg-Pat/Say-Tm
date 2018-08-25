
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="SayTM.png" type="image/gif" sizes="16x16">
	<title>Edit Money Page</title>
</head>
<body>
<?php
include "navbar2.php";
?>
<br>
    <br>
    <div style="text-align: center;color: black;font-size: 40px">Increase your E-money</div>
    <hr>
    <center>
    <h2>Username : <?php echo $fe->unm; ?></h2>
    <h2>Total Balance: <?php echo $fe->emoney; ?></h2><br>
    </center>
<form action="" method="POST">
	<table align="center" style=";border-radius: 10px; background: -webkit-linear-gradient(left,#85C1E9, #D6EAF8);">
		<tr>
			<td style="padding: 10px;color: black;">Enter Amount to Add : </td>
			<td style="padding: 10px"><input type="text" name="amount"></td>
		</tr>
		<tr align="center">
		<td></td>
			<td style="padding: 10px"><input type="submit" name="update" value="Add" style="border-radius: 5px;color:black; border-color: black; width: 80px;height: 40px;background-color: #D6EAF8"></td>
		</tr>		
	</table>
</form>
<hr>
</body>
</html>

<?php
if(isset($_REQUEST["update"]))
{
	$a=$_REQUEST["amount"];
	$up="update user_info set emoney=emoney+$a where id=$fe->id";
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

?>