<?php
 include('heading.php');
 include('cust_nav.php'); 

session_start();
 

if(isset($_GET['tablenumber'])){
  
   $_SESSION['tablenumber'] = $_GET['tablenumber'];
    $_SESSION['ordernumber'] = uniqid();
//    if($_SESSION['tablenumber'] !== $_GET['tablenumber'] ){
//        header("location: ?tablenumber={$_SESSION['tablenumber']}");
//    }
}

if(!isset($_SESSION['tablenumber'])){
    header("location: index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" href="fonts/bootstrap-icons.css">
</head>
<body>
    <?php
 include('heading.php');
 include('cust_nav.php'); 


?>

    
<div class="container">
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="img/c2.jpg" alt="..." style="">
     
    </div>
    <div class="item">
      <img src="img/c5.png" alt="...">
      
    </div>
      <div class="item">
      <img src="img/b8.jpeg" alt="...">
      
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    
<br>
<form method="POST" action="cust_proceedtoorder.php">

    <button name="pbutton" class="btn btn-warning" type="submit"  style="font-size:50px; margin: 0;position: absolute;
  top: 55%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%); background:rgba(255,163,26,0.5);" >Proceed to order<i class="bi bi-arrow-right-square" style="margin-left: 20px;"></i>
    </button>
  </form>  
    
    </div>


</body>
</html>