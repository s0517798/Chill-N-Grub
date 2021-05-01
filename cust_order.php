<?php include('includes/db_conn.php'); 
      include('heading.php');
      include('cust_nav.php');

session_start();
if(isset($_GET['tablenumber'])){
    if($_SESSION['tablenumber'] !== $_GET['tablenumber'] ){
        header("location: ?tablenumber={$_SESSION['tablenumber']}");
    }
}

if(!isset($_SESSION['tablenumber'])){
    header("location: index.php");
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
				$sql="select * from order_details where tblnum = '{$_SESSION['tablenumber']}' and stat NOT IN ('P') order by od_id desc";
				$query=$conn->query($sql);
               //..check count..
				while($row=$query->fetch_array()){
					?>
					<tr>
						<td><?php echo date('M d, Y h:i A', strtotime($row['date']))?></td>
						<td><?php echo $row['tblnum']; ?></td>
						<td class="text-left">&#8369; <?php echo number_format($row['total_amount'], 2); ?></td>
						<td><a href="#details<?php echo $row['od_id']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span> View </a>
							<?php include('cust_order_disp.php'); ?>
						</td>
					</tr>
					<?php
				}
			?>

		</tbody>
	</table>
</div>

</body>
</html>