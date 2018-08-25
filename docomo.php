<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="SayTM.png" type="image/gif" sizes="16x16">
	<title>Docomo Plans</title>
	<style type="text/css">
		tr:nth-child(even){
    background-color: #F2F3F4;
    font-size: 20px;
    color:black;
    opacity: 50%;
  }

  tr:nth-child(odd){
    background-color: #F8F9F9;
    font-size: 20px;
    color:black;
    opacity: 100%;
  }
	</style>
</head>
<body>
<?php include("navbar2.php"); ?>
<br>
<br>
<center>
<div>
<img src="docomo.png" width="100" height="75"><br>
<div style="font-size: 30px">Docomo</div>
</div>
</center>
<hr>
<div style="float:left;width: 50%;  font-size: 20px;height: 200px;" align="center">
<table style="border:2px solid black">
<caption style="text-align: center;color: black;font-size: 20px">Select Mobile plan</caption>
	<tr style="font-size: 30px;" >
		<th style="padding: 10px; width: 200px;text-align: center;">
			Plan
		</th>
		<th style="padding: 10px; width: 150px;text-align: center;">
			Amount
		</th>
		<th></th>
	</tr>
	<?php
  	include("conn.php");
  	$s="select * from plans where oid=2 and ptype='mobile'";
  	$res=$conn->query($s);
  	while ($fe=$res->fetch_object())
  	{
  	?>
	<tr>
    <td style="padding: 10px; width: 200px"><?php echo $fe->pname;?></td>
    <td style="text-align: center; padding: 10px; width: 100px"><?php echo $fe->pprice;?></td>
  <td style="padding: 5px;"><a href="newplan.php?eid=<?php echo $fe->pid;?>"><button type="button" class="btn btn-default btn-lg" name="cartbutton">
  <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true">Add</span>
  </button>
  </a>
  </td>
  </tr>
   <?php
  }
  ?>

</table>
<hr>
</div>
<div style="float:left;width: 50%;  font-size: 20px;height: 200px;" align="center">
<table style="border:2px solid black">
<caption style="text-align: center;color: black;font-size: 20px">Select Data plan</caption>
	<tr style="font-size: 30px;" >
		<th style="padding: 10px; width: 200px;text-align: center;">
			Plan
		</th>
		<th style="padding: 10px; width: 150px;text-align: center;">
			Amount
		</th>
		<th></th>
	</tr>
	<?php
  	include("conn.php");
  	$s="select * from plans where oid=2 and ptype='data'";
  	$res=$conn->query($s);
  	while ($fe=$res->fetch_object())
  	{
  	?>
	<tr>
    <td style="padding: 10px; width: 200px"><?php echo $fe->pname;?></td>
    <td style="text-align: center; padding: 10px; width: 100px"><?php echo $fe->pprice;?></td>
  <td style="padding: 5px;"><a href="newplan.php?eid=<?php echo $fe->pid;?>"><button type="button" class="btn btn-default btn-lg" name="cartbutton">
  <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true">Add</span>
  </button>
  </a>
  </td>
  </tr>
   <?php
  }
  ?>

</table>
<hr>
</div>


</body>
</html>