<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="SayTM.png" type="image/gif" sizes="16x16">
<title>Recharge History</title>
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
    <?php include("navbar2.php"); 
   
    ?>
<br><br>
<div style="text-align:center; color:white">
    <h1 style="font-size:40px; color: black">MY RECHARGE HISTORY</h1><hr>
    </div>
    <div style="text-align: center">
    <table align="center" cellpadding="10" border="1" style="border-color: black">
  <tr>
    <th width="150px" style="font-size: 30px; text-align: center;">Order No.</th>
    <th width="150px" style="font-size: 30px; text-align: center;">Provider</th>
    <th width="200px" style="font-size: 30px; text-align: center;">Plan</th>
    <th width="200px" style="font-size: 30px; text-align: center;">Mobile No.</th>
    <th width="150px" style="font-size: 30px; text-align: center;">Price</th>
    <th width="150px" style="font-size: 30px; text-align: center;">Status</th>
  </tr>
  <?php
  include("conn.php");
  error_reporting(0);
  $id=$fe->id;
  $sq="select * from orders join user_info on orders.id=user_info.id join plans on plans.pid=orders.pid join order_status on orders.sid=order_status.sid join mobile_provider on plans.oid=mobile_provider.oid where orders.id=$id order by orderid desc";
  $res=$conn->query($sq);
  while ($re=$res->fetch_object())
  {
  ?>
  <tr style="text-align: center; font-size: 20px">
    <td style="padding: 10px"><?php echo $re->orderid;?></td>
  	<td style="padding: 10px"><?php echo $re->oname;?></td>
    <td style="padding: 10px"><?php echo $re->pname;?></td>
    <td style="padding: 10px"><?php echo $re->mno;?></td>
    <td style="padding: 10px"><?php echo $re->pprice;?></td>
    <td style="padding: 10px"><?php echo $re->status;?></td>
    <!--
  <td style="padding: 10px"><a href="delete.php?did=<?php //echo $fe->tid;?>"><button type="button" class="btn btn-default btn-lg" name="cartbutton">
  <span class="glyphicon glyphicon-trash" aria-hidden="true">Delete</span>
  </button>
  </a>
  </td>
  -->
  </tr>
  <?php
  }
  ?>
  </table>
  </div>
  <hr>
    </body>
</html>