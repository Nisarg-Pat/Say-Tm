<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="SayTM.png" type="image/gif" sizes="16x16">
	<title>Buy</title>
	<style type="text/css">

	.lin{
		border-color: transparent;
		border:1px solid black;
		padding: 10px;
		width: 100px;
		font-size: 20px;
		border-radius: 5px;
		transition-duration: 0.4s;
	}
		.lin:hover{
		background-color: #34495E;
		color: white;
	}
	</style>
</head>
<body>
<?php include("navbar2.php"); ?>
<br><br>
<center><h1 style="font-size: 40px">Buy Products from a variety of categories!</h1></center>
<hr>
<h1 style="margin-left: 100px; font-size: 35px">Pendrives:</h1>


<table align="center">
<?php
$sel="select * from buydata where otnum=1";
  $res=$conn->query($sel);
while ($re=$res->fetch_object())
{
	?>
<tr>
<td style="padding:30px;float: left"><div  style="border:2px solid black"><a href="<?php echo $re->imgname; ?>"><img src="<?php echo $re->imgname; ?>" width="200" height="150"></a></div></td>
<td style="font-size: 20px; width: 300px" align="center">
	<?php echo $re->data; ?><br>
	Price: <?php echo $re->buyprice;?><br>
	<span style="color: green">In Stock</span>
	</td>
	<td><a href="neworder.php?eid=<?php echo $re->buyid ?>"><button class="lin" style=" border:1px solid black;padding: 10px;width: 100px;font-size: 20px;border-radius: 5px">Buy</button></a></td>
</tr>
<?php
}
?>
</table>





<hr>
<h1 style="margin-left: 100px;font-size: 35px">Hard Disks:</h1>

<table align="center">
<?php
$sel="select * from buydata where otnum=2";
  $res=$conn->query($sel);
while ($re=$res->fetch_object())
{
	?>
<tr>
<td style="padding:30px;float: left"><div  style="border:2px solid black"><a href="<?php echo $re->imgname; ?>"><img src="<?php echo $re->imgname; ?>" width="200" height="150"></a></div></td>
<td style="font-size: 20px; width: 300px" align="center">
	<?php echo $re->data; ?><br>
	Price: <?php echo $re->buyprice;?><br>
	<span style="color: green">In Stock</span>
	</td>
	<td><a href="neworder.php?eid=<?php echo $re->buyid ?>"><button class="lin" style=" border:1px solid black;padding: 10px;width: 100px;font-size: 20px;border-radius: 5px">Buy</button></a></td>
</tr>
<?php
}
?>
</table><hr>

</body>
</html>