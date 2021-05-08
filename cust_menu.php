<?php 
include('includes/db_conn.php');
include('heading.php');
include('cust_nav.php'); 

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
<link rel="stylesheet" type="text/css" href="">
</head>
<body>
	
<div class="container-fluid" style="">
<div class="row">
<div class="col-50 mt-3">
	<h1 class="page-header text-center">MENU for Table Number <?php echo $_SESSION['tablenumber']; ?></h1>
	
	<form method="POST" action="cust_buy.php">
		
		<div class="row">
			<div class="col-md-12" style="margin-left:80%;">
			    <input hidden type="text"  name="tblnum" value="<?php echo $_SESSION['tablenumber']; ?>">
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Order</button>
			</div>
		</div>

	</form>
	
	<?php
					$where = "";
					if(isset($_GET['category']))
					{
						$catid=$_GET['category'];
						$where = " WHERE product.categoryid = $catid";
					}
                
					$sql="SELECT * FROM product left JOIN category on category.cat_id=product.cat_id
							LEFT JOIN pricing on product.prod_id = pricing.prod_id order by product.cat_id
							asc,prod_name asc;";
					$query=$conn->query($sql);
					$iterate=0;
                    ?>
                    <div class="container">
                            <div class="row">
                    <?php
					while($row=$query->fetch_array()){ ?>
	
                    <div class="card col-3" style="display: inline-block;">
                    <input type="checkbox" value="<?php echo $row['prod_id']; ?>||<?php echo $iterate; ?>" name="prod_id[]" style="">
                    <br>
                    <a href="img/<?php echo $row['prod_img'];?>"><img src="img/<?php echo $row['prod_img']; ?>" height="100px" width="100px" class="card-img-top"></a>
                    <div class="card-body">       
                    <div class="card-body">
                    <h5 class="card-title"><?php echo $row['prod_name'];?></h5>
                    <p class="card-text"><?php echo $row['cat_desc'];?></p>
                    <p class=card-text> &#8369;<?php echo $row['price'];?></p>
                      
                    </div>
                    
                        <div class="card-footer"> <input style="width:100%;" type="number" class="form-control" name="qty_<?php echo $iterate; ?>"> </div>
                    
                    <?php
						$iterate++;
					}
				?>
				
</div>
</div>
</div>
 <div class="col-10"></div>
</div>
</div>				



	

<script type="text/javascript">
	$(document).ready(function(){
		$("#checkAll").click(function(){
	    	$('input:checkbox').not(this).prop('checked', this.checked);
		});
	});
</script>


</body>

</html>
