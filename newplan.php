<?php
include("conn.php");
if(isset($_REQUEST["eid"]))
{
  $id=$_REQUEST["eid"];
  $sel="select * from plans join mobile_provider on plans.oid=mobile_provider.oid where pid=$id";
  $res=$conn->query($sel);
  $re=$res->fetch_object();
}




?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="SayTM.png" type="image/gif" sizes="16x16">
<title>New Plan</title>

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
    <h1 style="font-size:50px ">PLAN</h1><br>
    </div>

    
    <table align="center" border="1">
  <tr class="t">
    <th width="300px" style="font-size: 40px; text-align: center;">Provider</th>
    <th width="400px" style="font-size: 40px; text-align: center;">Plan</th>
    <th width="200px" style="font-size: 40px; text-align: center;">Price</th>
  </tr>
  <tr class="t" style="font-size: 30px; text-align: center;">
    <td ><?php echo $re->oname;?></td>
    <td ><?php echo $re->pname;?></td>
    <td style="text-align: center;"><?php echo $re->pprice;?></td>  
  </tr>
  </table>
  
  <br><br>
  <form action="" method="POST">
  <table align="center" style=";border-radius: 10px; background: -webkit-linear-gradient(left,#85C1E9, #D6EAF8);">
    <tr>
      <td style="padding: 10px;color: black;">Enter Mobile Number : </td>
      <td style="padding: 10px"><input type="text" name="mno"></td>
    </tr>
    <tr align="center">
    <td></td>
      <td style="padding: 10px"><input type="submit" name="submit" value="Submit" style="border-radius: 5px;color:black; border-color: black; width: 80px;height: 40px;background-color: #D6EAF8"></td>
    </tr>   
  </table>
</form>
    </body>
</html>
<?php
if(isset($_REQUEST["submit"]))
{
  $mno=$_REQUEST["mno"];
  if($fe->emoney >= $re->pprice)
    {
      $ins="insert into orders(id,pid,mno,sid) values($fe->id,$re->pid,$mno,2)";
      $res=$conn->query($ins);
        if($res){
          $up="update user_info set emoney=emoney-$re->pprice where id=$fe->id";
          $res_up=$conn->query($up);
         ?>
      <script type="text/javascript">
      alert("Added to Cart");
      window.location="confirm.php";
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