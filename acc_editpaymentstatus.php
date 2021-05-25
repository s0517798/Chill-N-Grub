<?php
	include_once "includes/db_conn.php";

	$id=$_GET['status'];

	$sql="update order_details set stat='P' where order_number='$id'";
	$conn->query($sql);

	header('location:acc_sales.php');
?>