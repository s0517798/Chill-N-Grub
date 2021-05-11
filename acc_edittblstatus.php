<?php
	include_once "includes/db_conn.php";

    $tblnum =$_GET['table'];
        
    $sql="update mesa set status ='A' where tbnum = '$tblnum' ";

	$conn->query($sql);

	header('location:acc_sales.php');
?>