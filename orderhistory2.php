<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="SayTM.png" type="image/gif" sizes="16x16">
<title>Order History</title>
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
    <h1 style="font-size:40px; color: black">MY ORDER HISTORY</h1><hr>
    </div>
    <div style="text-align: center">
    <table align="center" cellpadding="10" border="1" style="border-color: black">
  <tr>
    <th width="150px" style="font-size: 30px; text-align: center;">Order No.</th>
    <th width="200px" style="font-size: 30px; text-align: center;">Product</th>
    <th width="400px" style="font-size: 30px; text-align: center;">Address</th>
    <th width="150px" style="font-size: 30px; text-align: center;">Quantity</th>
    <th width="150px" style="font-size: 30px; text-align: center;">Price</th>
    <th width="150px" style="font-size: 30px; text-align: center;">Status</th>
    <th></th>
  </tr>
  <?php
  include("conn.php");
  error_reporting(0);
    $sel="select * from buyorder join user_info on buyorder.id=user_info.id join buydata on buydata.buyid=buyorder.buyid join order_status on buyorder.sid=order_status.sid join ordertype on ordertype.otnum=buydata.otnum where $fe->id=buyorder.id order by boid desc";
  $res=$conn->query($sel);
  while ($re=$res->fetch_object())
  {
  ?>
  <tr style="text-align: center; font-size: 20px">
    <td style="padding: 10px"><?php echo $re->boid;?></td>
    <td style="padding: 10px"><?php echo $re->data;?></td>
    <td style="padding: 10px"><?php echo $re->Address;?></td>
    <td style="padding: 10px"><?php echo $re->qnty;?></td>
    <td style="padding: 10px"><?php echo $re->total;?></td>
    <td style="padding: 10px"><?php echo $re->status;?></td>
  <td style="padding: 10px"><a href="details.php?did=<?php echo $re->boid;?>"><button type="button" class="btn btn-default btn-lg" name="cartbutton">
Details
  </button>
  </a>
  </td>
  
  </tr>
  <?php
  }
  ?>
  </table>
  </div>
  <hr>
    </body>
</html>