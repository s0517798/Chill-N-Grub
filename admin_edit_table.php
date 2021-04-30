<?php
	include_once "includes/db_conn.php";

	$id = $_GET['mesa'];

	$tname=$_POST['tname'];

    $sql="select * from mesa where tbl_id='$id'";
	$query=$conn->query($sql);
	$row=$query->fetch_array();

	$fileinfo=PATHINFO($_FILES["photo"]["name"]);

	if (empty($fileinfo['filename'])){
		$location = $row['qr_img_file'];
	}
    else{
		$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		move_uploaded_file($_FILES["photo"]["tmp_name"],"img/qr/" . $newFilename);
		$location= $newFilename;
	}


	$sql="update mesa set tbnum='$tname', qr_img_file='$location' where tbl_id='$id'";
	$conn->query($sql);

	header('location:admin_mesa.php');
?>