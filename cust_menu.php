<?php 
include('includes/db_conn.php');

  session_start();  

if(isset($_GET['tablenumber'])){
  
  $_SESSION['tablenumber'] = $_GET['tablenumber'];
//    if($_SESSION['tablenumber'] !== $_GET['tablenumber'] ){
//        header("location: ?tablenumber={$_SESSION['tablenumber']}");
//    }
}

if(!isset($_SESSION['tablenumber'])){
 header("location: index.php");
}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" type="text/css" href="">
</head>
<body>
<br><br>
<?php include('heading.php');
include('cust_nav.php'); ?>


    <div class="container" >
        <form method="POST" action="cust_buy.php">
            <div class="row">
	<h1 class="page-header text-center">MENU for Table Number <?php echo $_SESSION['tablenumber']; ?></h1>
	
            </div>
		
		<div class="row">
			<div class="col-md-12 text-center" >
			    <input hidden type="text"  name="tblnum" value="<?php $_SESSION['tablenumber'] ?>">
             <input hidden type="text"  name="ordernumber" value="<?php $_SESSION['ordernumber'] ?>">
				<button type="submit" class="btn btn-primary" style="transition: all .25s ease-in-out;
                                                                     position: fixed;
                                                                     width: 20%; 
                                                                     height: 15%; 
                                                                     top: 0;
                                                                     left: 0;
                                                                     right: 0;
                                                                     bottom: 0;
                                                                     margin-top: 430px;
                                                                     margin-left: 1000px;
                                                                     background-color: rgba(255,153,0,0.5); 
                                                                     z-index: 2; 
                                                                     cursor: pointer; 
                                                                     font-size: 30px;">
                    <span class="glyphicon glyphicon-floppy-disk"></span> Order</button>
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
                    
        
                    <div class="col-lg-3" style="background: #ffebcc; margin-bottom:5px; font-family: garamond; ">
                        <div class="card" style="width: 18rem; height: 350px; margin-left:35px; ">
                            <br>
                            <img src="img/<?php echo $row['prod_img']?>" class="card-img-top" width="300px" alt="300x300" style="width: 300px; display: block; margin-left: auto; margin-right: auto; width: 90%;">
                    <div class="card-body" style="margin-left: 20px;">
                        <h5 style="font-weight: bold; font-size: 15px;"><?php echo $row['cat_desc'];?></h5>
                        
                    <input type="checkbox" value="<?php echo $row['prod_id']; ?>||<?php echo $iterate; ?>" name="prod_id[]">
                    <br>
                    <label for="item<?php echo $row['prod_id']; ?>">
                        <h5 style="font-size: 18px;"><?php echo $row ['prod_name'];?></h5>
                    </label>
                        
                        <br>
                        <h5>&#8369; <?php echo number_format($row['price'], 2); ?></h5>
                        
                        <input type="hidden" value="<?php echo $row['price'];?>" name="item_price[]">
                        <input class=" " type="number" value="1" class="form-control" style="width:150px;" name="qty_<?php echo $iterate; ?>">
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
