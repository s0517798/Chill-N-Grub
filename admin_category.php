<?php 

session_start();

if(isset($_SESSION['usertype']) && isset($_SESSION['userid'])){
    switch($_SESSION['usertype']){
        case 'A' : header("location: ");
            break;
        case 'C' : break;
        case 'W' : break;  
    }
}
else{
    header("location: index.php");
}
    include_once "includes/functions.php";
    include_once "includes/db_conn.php";
    include_once "heading.php";
    include_once "admin_nav.php";

?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="bs/scrollbar.css">
    
</head>
<body>
<div class="container" style="margin-top: 100px;">
	<h1 class="page-header text-center" style="font-family: corbel; font-weight: bold; font-size: 70px; color: white;">CATEGORY</h1>
	<div class="row">
		<div class="col-md-12">
			<a href="#addcategory" data-toggle="modal" class="pull-right btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Category</a>
		</div>
	</div>
	<div style="margin-top:10px; border: solid #ff9900; background: rgba(255,255,255,0.5); color: black;">
		<table class="table table-striped table-bordered">
			<thead style="background: #ff9900; border: solid white;">
				<th style="font-size: 20px;">Category Name</th>
				<th style="font-size: 20px;">Action</th>
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
								<?php include('admin_category_modal.php'); ?>
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>
</div>
<?php include('admin_category_modal.php'); ?>
</body>
</html>
