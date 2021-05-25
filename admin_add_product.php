<?php
	include_once "includes/db_conn.php";

	$pname=$_POST['pname'];
	$price=$_POST['price'];
	$category=$_POST['category'];


	$fileinfo=PATHINFO($_FILES["photo"]["name"]);

	
	$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
	move_uploaded_file($_FILES["photo"]["tmp_name"],"img/" . $newFilename);
	$location=$newFilename;
	
	$sql1="insert into product ( prod_name, cat_id, prod_img) values ('$pname', '$category', '$location')";
	$conn->query($sql1);
    
    $sql2 = "select * from product where prod_name = '$pname'";
    $query=$conn->query($sql2);
    while($row=$query->fetch_array()){

    $sql3 = "insert into pricing (prod_id) values ('".$row['prod_id']."')";
        $conn->query($sql3);
      }  
	header('location:admin_product.php');

?>
