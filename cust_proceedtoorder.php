<?php
include_once "includes/db_conn.php";

session_start();  

$ordernum= $_SESSION['ordernumber'];
$tblnum= $_SESSION['tablenumber'];


if (isset($_POST['pbutton'])){
    

		$sql="insert into order_details (order_number,tblnum, date) values ('$ordernum','$tblnum', NOW())";
		$conn->query($sql);
    
    header('location:cust_menu.php');
    
}

?>