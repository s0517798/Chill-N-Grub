<?php

include_once "includes/db_conn.php";

if (isset($_POST['pbutton'])){
    
        $ordernumber="ABCD";
		$tblnum="AB12";
		$sql="insert into order_details (order_number,tblnum, date) values ('$ordernumber','$tblnum', NOW())";
		$conn->query($sql);
    
    header('location:cust_menu.php');
    
}

