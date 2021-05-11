<?php
	include_once "includes/db_conn.php";

	$id = $_GET['account'];

	$sql="delete from users where user_id='$id'";
	$conn->query($sql);

	header('location:admin_accounts.php');
?>