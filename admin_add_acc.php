<?php
	include_once "includes/db_conn.php";

	$uname=$_POST['uname'];
	$password=$_POST['pword'];
	$usertype=$_POST['utype'];

	
	$sql1="insert into users ( user_name, password, usertype) values ('$uname', '$password', '$usertype')";
	$conn->query($sql1);
    

	header('location:admin_accounts.php');