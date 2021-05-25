<?php include('includes/db_conn.php'); 
      include('heading.php');
      include('cust_nav.php');

session_start();
if(isset($_GET['tablenumber'])){
    if($_SESSION['tablenumber'] !== $_GET['tablenumber'] ){
        header("location: ?tablenumber={$_SESSION['tablenumber']}");
    }
}
if(!isset($_SESSION['tablenumber'])){
   header("location: index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" type="text/css" href="bs/order.css">
</head>
<body>

 <div class="container-fluid">
                  
          <?php        
                $sql1="select * from order_details where order_number='{$_SESSION['ordernumber']}' and stat NOT IN ('P') order by od_id desc";
     
				$query=$conn->query($sql1);
   
                while($arow=$query->fetch_array()){
            ?>
                    <tr>
                    <br><br><br>
                    <td><?php echo "Date: " . date('M d, Y ', strtotime($arow['date']))?></td>
                  </tr>
                  
                  <tr>
                    <br>
                    <td><?php echo "Table Number: " . $arow['tblnum']; ?></td>
                   
                  </tr>
             <?php 
                }
           ?>
                     <br>   
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Purchase Quantity</th>
                            <th>Subtotal</th>
                        </thead>
                        <tbody>
                            <?php
                                
                            $sql2="select * from order_details where order_number='{$_SESSION['ordernumber']}' and stat NOT IN ('P') order by od_id desc";
     
                            $query=$conn->query($sql2);
   
                            while($brow=$query->fetch_array()){
                            
                        
                                $sql3="select * from orders left join product on product.prod_id=orders.prod_id left join pricing on product.prod_id=pricing.prod_id where order_number='". $brow['order_number']."'";
                                $dquery=$conn->query($sql3);
                                }
                                while($drow=$dquery->fetch_array()){
                                    ?>
                                    <tr>
                                        <td><?php echo $drow['prod_name']; ?></td>
                                        <td class="text-right">&#8369; <?php echo number_format($drow['price'], 2); ?></td>
                                        <td><?php echo $drow['qty']; ?></td>
                                        <td class="text-right">&#8369;
                                            <?php
                                                $subt = $drow['price']*$drow['qty'];
                                                echo number_format($subt, 2);
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                    
                                }
                            ?>
                            <tr>
                               
            <?php        
                $sql4="select * from order_details where order_number='{$_SESSION['ordernumber']}' and stat NOT IN ('P') order by od_id desc";
     
				$query=$conn->query($sql4);
   
                while($brow=$query->fetch_array()){
               
            ?>
                               
                               
                                <td colspan="3" class="text-right"><b>TOTAL</b></td>
                                <td class="text-right">&#8369; <?php echo number_format($brow['total_amount'], 2); ?></td>
                                
             <?php 
                }
           ?>
                            </tr>
                        </tbody>
                    </table>
                    <form action="cust_logout.php" >
                    <button id="checkout" type="submit" class="btn btn-warning">Check out</button>
                    </form>
                </div>

</body>
<script>
$(document).ready(function(){
    $("#checkout").click(function(){
        alert("Check out?").show();
        
    });
    });
</script>
</html>