<?php 
include('includes/db_conn.php');

   session_start();  

if(isset($_GET['tablenumber'])){
  
   $_SESSION['tablenumber'] = $_GET['tablenumber'];
   $_SESSION['ordernumber'] = "try";
//    if($_SESSION['tablenumber'] !== $_GET['tablenumber'] ){
//        header("location: ?tablenumber={$_SESSION['tablenumber']}");
//    }
}

//if(!isset($_SESSION['tablenumber'])){
   // header("location: ../");
//}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" type="text/css" href="">
</head>
<body>
<?php include('heading.php');
include('cust_nav.php'); ?>


    <div class="container">
        <form method="POST" action="cust_buy.php">
            <div class="row">
	<h1 class="page-header text-center">MENU for Table Number <?php echo $_SESSION['tablenumber']; ?></h1>
	
            </div>
		
		<div class="row">
			<div class="col-md-12 text-center">
			    <input hidden type="text"  name="tblnum" value="1">
			    <input hidden type="text"  name="ordernumber" value="TESTING">
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Order</button>
			</div>
		</div>

<div class="row">
	
	<?php
					$where = null;
					if(isset($_GET['category']))
					{
						$catid=$_GET['category'];
						$where = " WHERE product.categoryid = {$catid}";
					}
                
					$sql="SELECT * FROM product left JOIN category on category.cat_id=product.cat_id
							LEFT JOIN pricing on product.prod_id = pricing.prod_id " . $where. "order by product.cat_id
							asc,prod_name asc;";
					$query=$conn->query($sql);
					$iterate=0;
                    while($row=$query->fetch_array()){
                    ?>
                    
        
                    <div class="col-lg-3">
                        <div class="card" style="height: 400px;">
                            <img src="img/<?php echo $row['prod_img']?>" class="card-img-top" width="200px" alt="200x200">
                    <div class="card-body">
                        <h5><?php echo $row['cat_desc'];?></h5>
                        
                    <input type="checkbox" value="<?php echo $row['prod_id']; ?>||<?php echo $iterate; ?>" name="prod_id[]">
                    
                    <label for="item<?php echo $row['prod_id']; ?>">
                        <h5><?php echo $row ['prod_name'];?></h5>
                    </label>
                        
                        <br>
                        <h5>&#8369; <?php echo number_format($row['price'], 2); ?></h5>
                        
                        <input type="hidden" value="<?php echo $row['price'];?>" name="item_price[]">
                        <input type="number" value="1" class="form-control" name="qty_<?php echo $iterate; ?>">
                </div>
            </div>            
                      
        </div>
                    
                        
                    
                    <?php
						$iterate++;
					}
				?>
				
    </div>
    </form>
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
