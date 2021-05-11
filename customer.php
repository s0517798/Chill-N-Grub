<?php

 include('cust_nav.php'); 
 include('heading.php');


session_start();

if(!isset($_SESSION['tablenumber'])){
    header("location: index.php");
}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bs/customer.css">
</head>
<body>

<div class="heading">
	
</div>
<div class="content">
<div class="content1">
<h1>Chill N Grub</h1>
</div>
	
</div>

<div class="footer">
	
</div>
</div>
</body>
</html>