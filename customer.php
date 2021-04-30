<?php
session_start();

if(!isset($_SESSION['tablenumber'])){
    header("location: ../");
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

<?php include('cust_nav.php'); ?>
<?php include('heading.php') ?>

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