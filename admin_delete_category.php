<?php
	include_once "includes/db_conn.php";

	$id = $_GET['category'];

	$sql="delete from category where cat_id='$id'";
	$conn->query($sql);

	header('location:admin_category.php');
?>