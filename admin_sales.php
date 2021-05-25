 style="font-size: 20px;"<?php 

    include_once "includes/db_conn.php";
    include_once "heading.php";
    include_once "admin_nav.php";

?>

<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="bs/sales.css">
<link rel="stylesheet" type="text/css" href="bs/admin_sales.css">
</head>

<body>
<div class="container">

	<h1 class="page-header text-center"style="margin-top: 100px;">ORDERS</h1>
	<table class="table" style="border:solid #ff9900; background: rgba(255,255,255,0.5); color: black;">
		<thead style="background: #ff9900; border: solid white;">
			<th style="font-size: 20px;">Date</th>
			<th style="font-size: 20px;">Table Name</th>
			<th style="font-size: 20px;">Total Sales</th>
			<th style="font-size: 20px;">Status</th>
			<th style="font-size: 20px;">Details</th>
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
<<<<<<< Updated upstream
						<td><?php echo $row['stat']; ?></td>
						<td><a href="#details<?php echo $row['od_id']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span> View </a>
=======
						<td> <?php switch($row['stat']){
                                 case 'P': echo "Paid" ;
                                    break;
                                 case 'U': echo "Not paid</p>"; 
                                    break;                  
                                   }?>
                        </td>
						<td><a href="#details<?php echo $row['order_number']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span> View </a>
>>>>>>> Stashed changes
							<?php include('admin_sales_disp.php'); ?>
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