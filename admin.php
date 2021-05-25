<?php 

session_start();

if(isset($_SESSION['usertype']) && isset($_SESSION['userid'])){
    switch($_SESSION['usertype']){
        case 'A' : header("location: ");
            break;
        case 'C' : break;
        case 'W' : break;  
    }
}
else{
    header("location: index.php");
}
include_once "includes/functions.php";
include_once "heading.php"; 
include_once "admin_nav.php";
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bs/index.css">
	<link rel="stylesheet" type="text/css" href="bs/admin.css">
</head>
<body>
<div class="CNG">
	<h1><img  src="img/logo.png" style="height: 500px; width:500px; margin:-240px;">Chill n Grub</h1>
</div>



</body>
</html>
