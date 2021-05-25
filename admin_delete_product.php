<?php
	include_once "includes/db_conn.php";

	$id = $_GET['product'];

	$sql="delete from product where prod_id='$id'";
	$conn->query($sql);
    
    $sql2="delete from pricing where prod_id='$id'";
	$conn->query($sql2);

	header('location:admin_product.php');
?>