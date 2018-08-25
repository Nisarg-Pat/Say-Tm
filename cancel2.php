<?php
include("conn.php");
include 'navbar2.php';
if(isset($_REQUEST["eid"]))
{
  $id=$_REQUEST["eid"];
    $sel="select * from buyorder join user_info on buyorder.id=user_info.id join buydata on buydata.buyid=buyorder.buyid join order_status on buyorder.sid=order_status.sid join ordertype on ordertype.otnum=buydata.otnum where boid=$id";
  $res=$conn->query($sel);
  $re=$res->fetch_object();
  if($re->sid==4)
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
    $up2="update user_info set emoney=emoney+$re->total where id=$fe->id";
    $res_up2=$conn->query($up2);
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
    $up2="update user_info set emoney=emoney+$re->total where id=$fe->id";
    $res_up2=$conn->query($up2);
		?>
		<script type="text/javascript">
      alert("Order Cancelled");
      window.location="orderhistory2.php";
      </script>
      <?php
	}
  else
  {
    ?>
    <script type="text/javascript">
      alert("Order Cancellation Failed");
      window.location="orderhistory2.php";
      </script>
      <?php
  }

}
?>