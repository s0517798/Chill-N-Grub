<?php
	include_once "includes/db_conn.php";

    $id=$_GET['account'];

	$uname=$_POST['uname'];
	$password=$_POST['pword'];
	$usertype=$_POST['utype'];

	
	$sql1="update users set user_name='$uname', password='$password', usertype='$usertype' where user_id='$id'";
	$conn->query($sql1);
    

	header('location:admin_accounts.php');