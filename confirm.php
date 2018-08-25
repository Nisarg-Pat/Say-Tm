<!DOCTYPE html>
<html>
<head>
<title>Recharge Confirmation</title>
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
<link rel="icon" href="SayTM.png" type="image/gif" sizes="16x16">
<body>
    <?php include("navbar2.php"); 
   
    ?>
<br><br>
<div style="text-align:center; color:black">
    <h1 style="font-size:50px ">Order Confirmed</h1>
    <hr>
    </div>
    <?php
    $sel="select * from orders join user_info on orders.id=user_info.id join plans on plans.pid=orders.pid join order_status on orders.sid=order_status.sid join mobile_provider on plans.oid=mobile_provider.oid where orders.id=$fe->id order by orderid desc limit 1";
  $res=$conn->query($sel);
  $re=$res->fetch_object();
    ?>
<div style="text-align: center; font-size: 30px">
    Your Following Order is Confirmed:<br>
    <?php echo $re->oname;?>
    <?php echo $re->pname;?><br>
    For Rs:<?php echo $re->pprice;?><br>
    Your Order Number is <?php echo $re->orderid;?><br>
    Current Status: <?php echo $re->status;?>
    <br>
    Your Available balance is : <?php echo $fe->emoney; ?>
</div>
<hr>
<!--
    <form action="" method="POST">
    <table align="center" cellpadding="10" border="1">
  <tr>
    <th width="300px" style="font-size: 40px; text-align: center;">Provider</th>
    <th width="400px" style="font-size: 40px; text-align: center;">Plan</th>
    <th width="200px" style="font-size: 40px; text-align: center;">Price</th>
    
  </tr>
  <tr style="font-size: 30px; text-align: center;">
    <td ><?php //echo $re->oname;?></td>
    <td ><?php //echo $re->pname;?></td>
    <td style="text-align: center;"><?php //echo $re->pprice;?></td>
  </tr>
  </table>
  </form>
  -->

<br>
<center>
  <a href="page.php"><button class="lin" style=" border:1px solid black;padding: 10px;width: 120px;font-size: 20px;border-radius: 5px">Home</button></a></center>
  <hr>
    </body>
</html>