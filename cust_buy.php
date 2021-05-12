<?php
	include_once "includes/db_conn.php";
session_start();


//ORDER DETAILS								
//od_id	order_number	tbl_num	prod_id	item_qty	total_amt	order_date	status	price
//  1	609bc10787db5	1	      1	      7	         52.71	   12/05/2021	P	   7.53
//  2	609bc10787db5	1	      12      	7	     2478	   12/05/2021	P	   354
//  3	609bc10787db5	1	      10      	7	     2051	   12/05/2021	P	   293
//								
//ORDERS								
//order_id 	order_number	tbl_num	item_qty	total_amt	order_date	status		
//1	        609bc10787db5	1	    21	         4581.71	12/05/2021	C		


//if (isset($_POST['ORDER_BTN'])){
//    
//    $tbl_number = $_SESSION['tablenumber'];
//    
//    
//    
//    for($i = 0; $i < count($_POST['prod_id']) ; $i++){
//        
//       // echo $order_number . "," . $tbl_number . ", " . $_POST['prod_id'][$i] . " : " . $_POST['item_qty'][$i] . " pcs," . $_POST['item_price'][$i] . "<br>";
//        
//        //insert every checked ordered items into the order_details table
//        //ORDER DETAILS
//        //od_id	,tbl_num, prod_id,item_qty,	total_amt,	order_date,	status
//
//        
//        
//    }
//    
//    
//   $orders_sql = "insert into orders
//      (order_number,table_number,total_qty, total_amount)
//     SELECT {$order_number} 
//          , tblnum 
//          , sum(item_qty)
//          , sum(total_amt)
//       from order_details 
//      where order_number = '{$order_number}'
//      GROUP BY tblnum;"
//    
//    
//    
//
//    
//}
//
//
//die;
//        
	if(isset($_POST['prod_id'])){
 
		$tblnum=$_POST['tblnum'];
		$sql="insert into order_details (tblnum, date) values ('$tblnum', NOW())";
		$conn->query($sql);
		$pid=$conn->insert_id;
 
		$total=0;
 
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
     
		     	$sql="insert into orders (od_id, prod_id, qty) values ('$pid', '$productid', '".$_POST['qty_'.$iterate]."')";
		     	$conn->query($sql);
		     }
		endforeach;
 		
 		$sql="update order_details set total_amount='$total' where od_id='$pid'";
 		$conn->query($sql);
		header('location:cust_order.php');		
	}
	else{
		?>
<script>
    window.alert('Please select a product');
    window.location.href = 'cust_menu.php';

</script>
<?php
	}
?>
