<?php
	include_once "includes/db_conn.php";

	$id=$_GET['status'];

	$sql="update order_details set stat='P' where od_id='$id'";
	$conn->query($sql);

	header('location:acc_sales.php');
?>