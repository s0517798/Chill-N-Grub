<?php 

session_start();

if(isset($_SESSION['usertype']) && isset($_SESSION['userid'])){
    switch($_SESSION['usertype']){
        case 'A' : break;
        case 'C' : header("location: accountant.php ");
            break;
        case 'W' : break;  
    }
}
else{
    header("location: index.php");
}
include_once "includes/functions.php";
    
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
<br>
<br>
<br>
    
	<h1 class="page-header text-center" style="font-family:garamond;">O R D E R S</h1>
	<table class="table table-striped table-hover" style="background:#ff9900; color:black;">
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
						<td><?php echo date('M d, Y', strtotime($row['date']))?></td>
						<td><?php echo $row['tblnum']; ?></td>
						<td class="text-left">&#8369; <?php echo number_format($row['total_amount'], 2); ?></td>
						<td><?php switch($row['stat']){
                                 case 'P': echo "Paid" ;
                                    break;
                                 case 'U': echo "Not paid"; 
                                    break;                  
                                   }?></td>
						<td><a href="#details<?php echo $row['order_number']; ?>" data-toggle="modal" class="btn btn-outline-danger btn-sm"><span class="glyphicon glyphicon-search"></span> View Details </a>
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