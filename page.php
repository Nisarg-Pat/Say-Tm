<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="SayTM.png" type="image/gif" sizes="16x16">
	<title>Say-tm</title>
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
 <?php include("navbar2.php"); ?>
 <br><br>
 <div style="margin-left: 30px;margin-right:30px;font-size: 20px ">
 <p style="float: left">Customer ID : <?php echo $fe->id; ?></p>
 <p style="float: right">Email ID : <?php echo $fe->email; ?></p>
 </div><br><br>
 <p style="font-size: 20px;text-align: center ">Total Money: <?php echo $fe->emoney;?> </p>
 <hr >
 <h1 style="margin-left: 30px;">Recharge your mobile phone:
 <br>
 </h1>
 <table style="margin-left: 50px">
 <tr>
 <td style="margin-right:10px;font-size: 20px;width: 600px ">Recharge your phone from the 3 service providers : </td>
 <td>  <a href="recharge.php"><button class="lin" style=" border:1px solid black;padding: 10px;width: 120px;font-size: 20px;border-radius: 5px">Recharge</button></a></td>
 </tr>
 </table>
 <h1 style="margin-left: 30px;">Buy Products:
 <br>
 </h1>
 <table style="margin-left: 50px">
 <tr>
 <td style="margin-right:10px;font-size: 20px;width: 600px ">Buy Products from 2 Categories :</td>
 <td>  <a href="buy.php"><button class="lin" style=" border:1px solid black;padding: 10px;width: 120px;font-size: 20px;border-radius: 5px">Buy</button></a></td>
 </tr>
 </table>
 <hr>
</body>
</html>