<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="SayTM.png" type="image/gif" sizes="16x16">
<title>Order Confirmation</title>
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
    <?php include("navbar2.php"); 
   
    ?>
<br><br>
<div style="text-align:center; color:black">
    <h1 style="font-size:50px ">Order Confirmed</h1><br>
    </div>
    <?php
    $sel="select * from buyorder join user_info on buyorder.id=user_info.id join buydata on buydata.buyid=buyorder.buyid join order_status on buyorder.sid=order_status.sid join ordertype on ordertype.otnum=buydata.otnum where buyorder.id=$fe->id order by boid desc limit 1";
  $res=$conn->query($sel);
  $re=$res->fetch_object();
    ?>
   
  
<div style="text-align: center; font-size: 30px">
    Your Following Order is Confirmed:<br></div>
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

<center>
  <a href="page.php"><button class="lin" style=" border:1px solid black;padding: 10px;width: 100px;font-size: 20px;border-radius: 5px">Home</button></a>
  <br><br>
    </body>
</html>