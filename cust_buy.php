<?php
session_start();  
	include_once "includes/db_conn.php";
        
	if(isset($_POST['prod_id'])){
        
        $ordernumber=$_SESSION['ordernumber'];
 
		$total=0;
        $finaltotal=0;
 
		foreach($_POST['prod_id'] as $product):
		$proinfo=explode("||",$product);
		$productid=$proinfo[0];
		$iterate=$proinfo[1];
		$sql="select * from pricing where prod_id='$productid'";
		$query=$conn->query($sql);
		$row=$query->fetch_array();
 
		if (isset($_POST['qty_'.$iterate])){
			$subt=$row['price']*$_POST['qty_'.$iterate];
			$total+=$subt;
            
        $sql1="select * from order_details where order_number='$ordernumber'";
		$query=$conn->query($sql1);
		$row1=$query->fetch_array();
            $finaltotal=$total+$row1['total_amount'];

			$sql="insert into orders (order_number, prod_id, qty) values ('$ordernumber', '$productid', '".$_POST['qty_'.$iterate]."')";
			$conn->query($sql);
		}
		endforeach;
 		
 		$sql="update order_details set total_amount='$finaltotal' where order_number='$ordernumber'";
 		$conn->query($sql);
		header('location:cust_order.php');		
	}
	else{
		?>
		<script>
			window.alert('Please select a product');
			window.location.href='cust_menu.php';
		</script>
		<?php
	}
?>