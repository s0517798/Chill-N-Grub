<<<<<<< Updated upstream:order.php
<?php include('includes/db_conn.php'); 
      include('heading.php');
      include('cust_nav.php') ;
session_start();
if(isset($_GET['tablenumber'])){
    if($_SESSION['tablenumber'] !== $_GET['tablenumber'] ){
        header("location: ?tablenumber={$_SESSION['tablenumber']}");
    }
}
?>
      

<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" type="text/css" href="bs/order.css">
</head>



<body>
<div class="container">

	<h1 class="page-header text-center">ORDERS</h1>
	<table class="table">
		<thead>
			<th>Date</th>
			<th>Table Name</th>
			<th>Total Sales</th>
			<th>Details</th>
		</thead>
		<tbody>
			<?php 
				$sql="select * from admin where tblnum = '{$_SESSION['tablenumber']}' and stat NOT IN ('P') order by admin_id desc";
				$query=$conn->query($sql);
               //..check count..
				while($row=$query->fetch_array()){
					?>
					<tr>
						<td><?php echo date('M d, Y h:i A', strtotime($row['date']))?></td>
						<td><?php echo $row['tblnum']; ?></td>
						<td class="text-left">&#8369; <?php echo number_format($row['total_amount'], 2); ?></td>
						<td><a href="#details<?php echo $row['admin_id']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span> View </a>
							<?php include('order_disp.php'); ?>
						</td>
					</tr>
					<?php
				}
			?>

		</tbody>
	</table>
</div>

</body>
=======
<?php include('includes/db_conn.php'); 
      include('heading.php');
      include('cust_nav.php');

session_start();
if(isset($_GET['tablenumber'])){
    if($_SESSION['tablenumber'] !== $_GET['tablenumber'] ){
        header("location: ?tablenumber={$_SESSION['tablenumber']}");
    }
}
//if(!isset($_SESSION['tablenumber'])){
 //   header("location: index.php");
//}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" type="text/css" href="bs/order.css">
</head>
<body>

 <div class="container-fluid">
                  
          <?php        
                $sql1="select * from order_details where order_number='ABCD' and stat NOT IN ('P') order by od_id desc";
     
				$query=$conn->query($sql1);
   
                while($arow=$query->fetch_array()){
            ?>
                    <tr>
                    <br><br><br>
                    <td><?php echo "Date: " . date('M d, Y ', strtotime($arow['date']))?></td>
                  </tr>
                  
                  <tr>
                    <br>
                    <td><?php echo "Table Number: " . $arow['tblnum']; ?></td>
                   
                  </tr>
             <?php 
                }
           ?>
                     <br>   
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Purchase Quantity</th>
                            <th>Subtotal</th>
                        </thead>
                        <tbody>
                            <?php
                                
                            $sql2="select * from order_details where order_number='ABCD' and stat NOT IN ('P') order by od_id desc";
     
                            $query=$conn->query($sql2);
   
                            while($brow=$query->fetch_array()){
                            
                        
                                $sql3="select * from orders left join product on product.prod_id=orders.prod_id left join pricing on product.prod_id=pricing.prod_id where order_number='". $brow['order_number']."'";
                                $dquery=$conn->query($sql3);
                                }
                                while($drow=$dquery->fetch_array()){
                                    ?>
                                    <tr>
                                        <td><?php echo $drow['prod_name']; ?></td>
                                        <td class="text-right">&#8369; <?php echo number_format($drow['price'], 2); ?></td>
                                        <td><?php echo $drow['qty']; ?></td>
                                        <td class="text-right">&#8369;
                                            <?php
                                                $subt = $drow['price']*$drow['qty'];
                                                echo number_format($subt, 2);
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                    
                                }
                            ?>
                            <tr>
                               
            <?php        
                $sql4="select * from order_details where order_number='ABCD' and stat NOT IN ('P') order by od_id desc";
     
				$query=$conn->query($sql4);
   
                while($brow=$query->fetch_array()){
               
            ?>
                               
                               
                                <td colspan="3" class="text-right"><b>TOTAL</b></td>
                                <td class="text-right">&#8369; <?php echo number_format($brow['total_amount'], 2); ?></td>
                                
             <?php 
                }
           ?>
                            </tr>
                        </tbody>
                    </table>
                    <form action="cust_logout.php" >
                    <button type="submit" class="btn btn-warning">Check out</button>
                    </form>
                </div>

</body>
>>>>>>> Stashed changes:cust_order.php
</html>