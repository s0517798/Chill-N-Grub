<?php
	include_once "includes/db_conn.php";

	$cname=$_POST['cname'];

	$sql="insert into category (cat_desc) values ('$cname')";
	$conn->query($sql);

	header('location:admin_category.php');

?>
