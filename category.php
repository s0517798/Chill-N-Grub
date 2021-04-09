<?php include('db_conn.php'); ?>
<?php include('heading.php'); ?>
<?php include('nav.php') ?>


<body>
    <link rel="stylesheet" href="bootstrap.min.css"> 

<div class="container">
	<h1 class="page-header text-center">CATEGORY</h1>
	<div class="row">
		<div class="col-md-12">
			<a href="#addcategory" data-toggle="modal" class="pull-right btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Category</a>
		</div>
	</div>
	<div style="margin-top:10px;">
		<table class="table table-striped table-bordered">
			<thead>
				<th>Category Name</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php
					$sql="select * from category order by cat_id asc";
					$query=$conn->query($sql);
					while($row=$query->fetch_array()){
						?>
						<tr>
							<td><?php echo $row['cat_desc']; ?></td>
							<td>
								<a href="#edit_category<?php echo $row['cat_id']; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit</a> || <a href="#del_category<?php echo $row['cat_id']; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a>
								<?php include('category_disp.php'); ?>
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>
</div>
<?php include('addproduct_modal.php'); ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
