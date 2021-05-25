 style=" font-size: 20px;"<?php 

    include_once "includes/db_conn.php";
    include_once "heading.php";
    include_once "admin_nav.php";

?>

<!DOCTYPE html>
<html>
<head>
	<title>PRODUCTS CRUD</title>
	<link rel="stylesheet" type="text/css" href="bs/product.css">
	<link rel="stylesheet" type="text/css" href="bs/scrollbar.css">
</head>


<div class="container">
	<h1 class="page-header text-center" style="font-size: 70px;
	font-family: corbel, monospace;
	color: white; font-weight: bold; margin-top: 100px;">PRODUCTS CRUD</h1>
	<div class="row">
		<div class="col-md-12">
			<select id="catList" class="btn btn-default">
			<option value="0">All Category</option>
			<?php
				$sql="select * from category";
				$catquery=$conn->query($sql);
				while($catrow=$catquery->fetch_array()){
					$catid = isset($_GET['category']) ? $_GET['category'] : 0;
					$selected = ($catid == $catrow['cat_id']) ? " selected" : "";
					echo "<option$selected value=".$catrow['cat_id'].">".$catrow['cat_desc']."</option>";
				}
			?>
			</select>
			<a href="#addproduct" data-toggle="modal" class="pull-right btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Product</a>
		</div>
	</div>
	<div style="margin-top:10px;">
		<table class="table" style="border:solid #ff9900; background: rgba(255,255,255,0.5); color: black;">
			<thead style="background: #ff9900; border: solid white;">
				<th style=" font-size: 20px;">Photo</th>
				<th style=" font-size: 20px;">Product Name</th>
				<th style=" font-size: 20px;">Price</th>
				<th style=" font-size: 20px;">Action</th>
			</thead>
			<tbody>
				<?php
					$where = "";
					if(isset($_GET['category']))
					{
						$catid=$_GET['category'];
						$where = " WHERE product.cat_id = $catid";
					}
					$sql="select * from product left join category on category.cat_id=product.cat_id left join pricing on product.prod_id=pricing.prod_id $where order by product.cat_id asc, prod_name asc;";
					$query=$conn->query($sql);
					while($row=$query->fetch_array()){
						?>
						<tr>
							<td><a href="img/<?php echo $row['prod_img'];?>"><img src="img/<?php echo $row['prod_img']; ?>" height="100px" width="100px"></a></td>
							<td><?php echo $row['prod_name']; ?></td>
							<td>&#8369; <?php echo number_format($row['price'], 2); ?></td>
							<td>
							    
								<a href="#editproduct<?php echo $row['prod_id']; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit</a> || <a href="#deleteproduct<?php echo $row['prod_id']; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a>
								<?php include('admin_editproduct_modal.php'); ?>
								<?php include('admin_deleteproduct_modal.php'); ?>
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>
</div>
<?php include('admin_addproduct_modal.php'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#catList").on('change', function(){
			if($(this).val() == 0)
			{
				window.location = 'admin_product.php';
			}
			else
			{
				window.location = 'admin_product.php?category='+$(this).val();
			}
		});
	});
</script>
</body>
</html>
