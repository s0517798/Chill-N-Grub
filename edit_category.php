<?php
	include('db_conn.php');

	$id=$_GET['category'];

	$cname=$_POST['cname'];

	$sql="update category set cat_desc='$cname' where cat_id='$id'";
	$conn->query($sql);

	header('location:category.php');
?>