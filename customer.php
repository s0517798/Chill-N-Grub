<?php
<<<<<<< Updated upstream
session_start();

if(!isset($_SESSION['tablenumber'])){
    header("location: ../");
}
=======
 include('heading.php');
 include('cust_nav.php'); 




session_start();

//if(!isset($_SESSION['tablenumber'])){
 //   header("location: index.php");
//}
>>>>>>> Stashed changes

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" href="font/bootstrap-icons.css">
</head>
<body>
    <?php
 include('heading.php');
 include('cust_nav.php'); 

<<<<<<< Updated upstream
<div class="heading">
	
</div>

<?php include('cust_nav.php'); ?>
<?php include('heading.php') ?>

<div class="content">
<div class="content1">
<h1>Chill N Grub</h1>
</div>
	
</div>
=======
>>>>>>> Stashed changes

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
      <img src="img/b1.jpg" alt="...">
     
    </div>
    <div class="item">
      <img src="img/b2.jpg" alt="...">
      
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
    <button name="pbutton" class="btn btn-success btn-lg" type="submit"  style="font-size:30px; margin: 0;position: absolute;
  top: 95%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);" >Proceed to order<i class="bi bi-arrow-right-square "></i>
    </button>
  </form>  
    
    </div>


</body>
</html>
Aa