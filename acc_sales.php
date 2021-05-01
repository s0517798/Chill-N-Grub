<?php 

    include_once "includes/db_conn.php";
    include_once "heading.php";
    include('acc_nav.php');

?>

<!DOCTYPE html>
<html>
<head>
    <style>
body {
    background-image: url('img/b2.jpg');
	background-position: center;
	background-size: cover;
	background-repeat: no-repeat;
	background-attachment: fixed;
	font-family: 'Franklin Gothic';
    }
</style>
<link rel="stylesheet" type="text/css" href="bs/sales.css">
</head>

<body >
<div class="container">

	<h1 class="page-header text-center">ORDERS</h1>
	<table class="table">
		<thead>
			<th>Date</th>
			<th>Table Name</th>
			<th>Total Sales</th>
			<th>Status</th>
			<th>Action</th>
		</thead>
		<tbody>
			<?php 
				$sql="select * from order_details order by od_id desc";
				$query=$conn->query($sql);
				while($row=$query->fetch_array()){
					?>
					<tr>
						<td><?php echo date('M d, Y h:i A', strtotime($row['date']))?></td>
						<td><?php echo $row['tblnum']; ?></td>
						<td class="text-left">&#8369; <?php echo number_format($row['total_amount'], 2); ?></td>
						<td><?php echo $row['stat']; ?></td>
						<td><a href="#details<?php echo $row['od_id']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span> View Details </a>
							<?php include('acc_sales_disp.php'); ?>
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