<?php
include("conn.php");
if(isset($_REQUEST["eid"]))
{
  $id=$_REQUEST["eid"];
    $sel="select * from buyorder join user_info on buyorder.id=user_info.id join buydata on buydata.buyid=buyorder.buyid join order_status on buyorder.sid=order_status.sid join ordertype on ordertype.otnum=buydata.otnum where boid=$id";
  $res=$conn->query($sel);
  $re=$res->fetch_object();
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="SayTM.png" type="image/gif" sizes="16x16">
	<title>Cancel</title>
	  <style type="text/css">

  .lin{
    border-color: transparent;
    border:1px solid black;
    padding: 10px;
    width: 100px;
    font-size: 20px;
    border-radius: 5px;
    transition-duration: 0.4s;
    color: #34495E; 
  }
    .lin:hover{
    background-color: #34495E;
    color: white;
  }
  </style>
</head>
<body>
<?php
include "navbar2.php";
?>
<br>
<br>
<div style="text-align: center; font-size: 30px">
    Are you sure you want to Cancel the Following Order : <hr></div>
 <table align="center">
      <td style="padding:30px;float: left"><div  style="border:2px solid black"><a href="<?php echo $re->imgname; ?>"><img src="<?php echo $re->imgname; ?>" width="200" height="200"></a></div></td>
    </td>
    <td style="font-size: 20px">
    <?php echo $re->data;?> <?php echo $re->type;?><br>
    For Rs : <?php echo $re->buyprice;?> each.
    Quantity : <?php echo $re->qnty;?><br>
    <?php 
      $tot=0.01;
      $tot=$re->qnty*$re->buyprice;
    ?>
    Total Cost : Rs.  <?php echo $re->total;/*echo sprintf("%.2f",$tot);*/ ?> /-<br>
    Your Order Number is <?php echo $re->boid;?><br>
    Current Status: <?php echo $re->status;?>
    <br>
    Deliver To: <?php echo $re->Address;?><br>
    Your Available balance is : <?php echo $fe->emoney; ?>
</td>
</table>


<center>
<a href="cancel2.php?eid=<?php echo $re->boid;?>">
<button class="lin" name="cancel" style=" border:1px solid black;padding: 10px;width: 100px;font-size: 20px;border-radius: 5px">Cancel</button></a>
  <br><br>
</center>
<hr>
</body>
</html>
<?php
if(isset($_REQUEST["cancel"]))
{	if($re->sid==4)
	{
		?>
      <script type="text/javascript">
      alert("Order is Already Cancelled");
      window.location="orderhistory2.php";
      </script>
      <?php
	}
	else if($re->sid==5)
	{
		?>
      <script type="text/javascript">
      alert("Order is Already Cancelled");
      window.location="orderhistory2.php";
      </script>
      <?php
	}
	else if($re->sid==3)
	{
		$up="update buyorder set sid=5 where boid=$re->boid";
		$res_up=$conn->query($up);
		?>
		<script type="text/javascript">
      alert("Order Returned");
      window.location="orderhistory2.php";
      </script>
      <?php
	}
	else if($re->sid==1)
	{
		$up="update buyorder set sid=4 where boid=$re->boid";
		$res_up=$conn->query($up);
		?>
		<script type="text/javascript">
      alert("Order Cancelled");
      window.location="orderhistory2.php";
      </script>
      <?php
	}
}


?>