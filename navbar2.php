<?php
session_start();
if(!$_SESSION['user'])
{
  header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <style>
  body{
    background-image: url(BackGround.jpg);
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-size:100% 100%;
  }
  .mynav{
    background: -webkit-linear-gradient(left,grey, white);
    position: relative;
    border: 2px solid black;
    border-radius: 25px;
  }
  /* Style The Dropdown Button */
.dropbtn {
  background-color: transparent;
  border-color: transparent;
    cursor: pointer;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
}

.dd{
  position: relative;
  height: 50px;
  width: 120px;
  text-align: center; 
  color: black;
  border:1px solid black;
}
.dd:hover{
  background-color: #34495E;
  color: white;
}

.dropdown:hover .dropdown-content {
    display: block;
}

  </style>
</head>
<body>
        <?php
        include("conn.php");
        $det=$_SESSION["user"];
        $sq="select * from user_info where unm='$det'";
        $res=$conn->query($sq);
        $fe=$res->fetch_object();
        ?>

<h1 align="center"><img src="SayTM.png" style="border:2px solid black; border-radius:5px;" height=100px width=100px> SayTm-The Spoof of PayTm and also ATM!!!</h1>
<br>


<div class="mynav">
<nav >
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="page.php" style="color: black;width: 100px;text-align: center;">Home</a>
    </div>




    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
        <li class="active" ><a href="recharge.php" style="color: black;width: 100px;text-align: center;border-left: 2px solid black;">Recharge<span class="sr-only">(current)</span></a></li>
        <li><a href="buy.php" style="color: black;width: 100px;text-align: center;border-left: 2px solid black;border-right: 2px solid black;">Buy</a></li>
        <li><a href="mywallet.php" style="color: black;width: 100px;text-align: center;border-right: 2px solid black;">My Wallet</a></li>
        <li><div style="color: black;width: 644px;text-align: center; font-size: 30px; margin-top: 6px;">
                <?php
                echo "Welcome ";
        echo $fe->name;
        echo "!!";
        ?>
        </div></li>
        </ul>

     <ul class="nav navbar-nav navbar-right">

<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: black;width: 120px;text-align: center;border-left: 2px solid black;">My Account <span class="caret"></span></a>
          <div class="dropdown-content" type="none" style="padding: 0px;border:1px solid black">
            <a href="history.php" style="color: black;"><button class="dd" role="button">History</button></a>
            <a href="editpass.php" style="color: black; border-top: 1px solid black"><button class="dd" role="button">Change Password</button></a>
            <hr style="margin-top: 0px;margin-bottom: 0px;border: 1px solid black;">
            <a href="contactus.php" style="color: black;"><button class="dd" role="button">Contact Us</button></a>
          </div>
        </li> 
        <li><a href="logout.php" style="color: black;width: 100px;text-align: center;border-left: 2px solid black;border-right: 2px solid black;;">Logout</a></li>
        <li style="width: 50px"></li> 
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>
</body>
</html>