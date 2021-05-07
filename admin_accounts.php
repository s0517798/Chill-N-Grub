<?php 

    include_once "includes/db_conn.php";
    include_once "heading.php";
    include_once "admin_nav.php";

?>
<html>
<head>
    
    <div class="container">
	<h1 class="page-header text-center">USER ACCOUNTS</h1>
	<div class="row">
		<div class="col-md-12">
			<a href="#add_acc" data-toggle="modal" class="pull-right btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Account</a>
		</div>
	</div>
	<div style="margin-top:10px;">
		<table class="table table-striped table-bordered">
			<thead>
				<th>Username</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php
					$sql="select * from users order by user_name asc";
					$query=$conn->query($sql);
					while($row=$query->fetch_array()){
						?>
						<tr>
							<td><?php echo $row['user_name']; ?></td>
							<td>
								<a href="#edit_acc<?php echo $row['user_id']; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit</a> || <a href="#del_acc<?php echo $row['user_id']; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a>
								<?php include('admin_accounts_modal.php'); ?>
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>
</div>
<?php include('admin_accounts_modal.php'); ?>
    
</head>
<body>