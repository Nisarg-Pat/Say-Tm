<?php
include("conn.php");
if(isset($_REQUEST["eid"]))
{
  $id=$_REQUEST["eid"];
  $sel="select * from buydata join ordertype on buydata.otnum=ordertype.otnum where buyid=$id";
  $res=$conn->query($sel);
  $re=$res->fetch_object();
}




?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="SayTM.png" type="image/gif" sizes="16x16">
<title>New Order</title>
  <style type="text/css">
    .t:nth-child(even){
    background-color: #F2F3F4;
    font-size: 20px;
    color:black;
    opacity: 50%;
  }

  .t:nth-child(odd){
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
<div style="text-align:center; color:black">
    <h1 style="font-size:50px ">ORDER</h1><hr>
    </div>

    
    <table align="center" cellpadding="10" border="1">
  <tr class="t">
    <th width="300px" style="font-size: 40px; text-align: center;">Type</th>
    <th></th>
    <th width="400px" style="font-size: 40px; text-align: center;">Product</th>
    <th width="200px" style="font-size: 40px; text-align: center;">Price</th>
  </tr>
  <tr class="t" style="font-size: 30px; text-align: center;">
    <td ><?php echo $re->type;?></td>
<td style="padding:30px;"><div  style="border:2px solid black"><a href="<?php echo $re->imgname; ?>"><img src="<?php echo $re->imgname; ?>" width="100" height="75"></a></div></td>
    <td ><?php echo $re->data;?></td>
    <td><?php echo $re->buyprice;?></td>  
  </tr>
  </table>
  
  <hr><br>
  <form action="" method="POST">
  <table align="center" style=";border-radius: 10px; background: -webkit-linear-gradient(left,#85C1E9, #D6EAF8);">
    <tr>
      <td style="padding: 10px;color: black;">Enter Address : </td>
      <td style="padding: 10px"><textarea name="address"></textarea></td>
    </tr>
    <tr>
      <td style="padding: 10px;color: black;">Quantity : </td>
      <td style="text-align: center;font-size: 20px">
    <select name="qnty">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
      <option>6</option>
      <option>7</option>
      <option>8</option>
      <option>9</option>
    </select>
    </td>

    </tr>
    <tr align="center">
    <td></td>
      <td style="padding: 10px"><input type="submit" name="submit" value="Submit" style="border-radius: 5px;color:black; border-color: black; width: 80px;height: 40px;background-color: #D6EAF8"></td>
    </tr>   
  </table>
</form>
<hr>
    </body>
</html>
<?php
if(isset($_REQUEST["submit"]))
{
  $add=$_REQUEST["address"];
  $qnty=$_REQUEST["qnty"];
  $tot=$re->buyprice*$qnty;
  if($fe->emoney >= $tot)
    {
      $ins="insert into buyorder(id,buyid,Address,qnty,total,sid) values($fe->id,$re->buyid,'$add',$qnty,$tot,1)";
      $res=$conn->query($ins);
        if($res){
          $up="update user_info set emoney=emoney-$tot where id=$fe->id";
          $res_up=$conn->query($up);
         ?>
      <script type="text/javascript">
      alert("Added to Cart");
      window.location="confirmbuy.php";
      </script>
      <?php
      }
  else
  {
    ?>
    <script type="text/javascript">
      alert("Cannot Add to Cart");
    </script>
    <?php
  }
}
else
{
  ?>
      <script type="text/javascript">
      alert("Not Enough Money!!! Increase Money");
      window.location="mywallet.php";
      </script>
      <?php
}
    
}
?>