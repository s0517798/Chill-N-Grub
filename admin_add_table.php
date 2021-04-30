<?php
	include_once "includes/db_conn.php";

	$tname=$_POST['tname'];
    $fileinfo=PATHINFO($_FILES["photo"]["name"]);

    $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
	move_uploaded_file($_FILES["photo"]["tmp_name"],"img/qr/" . $newFilename);
	$location= $newFilename;

    
	$sql="insert into mesa (tbnum,qr_img_file) values ('$tname','$location')";
	$conn->query($sql);

	header('location:admin_mesa.php');

?>
