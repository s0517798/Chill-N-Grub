<<<<<<< Updated upstream:order_disp.php
<!-- Sales Details -->
<?php include('db_conn.php'); ?>
<?php include('heading.php'); ?>

<div class="modal fade" id="details<?php echo $row['admin_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content " style="background-color: rgba(0, 0, 0, .5)" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Sales Full Details</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <h5>Table Number: <b><?php echo $row['tblnum']; ?></b>
                        <span class="pull-right">
                           <?php echo date('M d, Y h:i A', strtotime($row['date'])) ?>
                        </span>
                    </h5>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Purchase Quantity</th>
                            <th>Subtotal</th>
                        </thead>
                        <tbody>
                            <?php
                                $sql="select * from orders left join product on product.prod_id=orders.prod_id left join pricing on product.prod_id=pricing.prod_id where admin_id='". $row['admin_id']."'";
                                $dquery=$conn->query($sql);
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
                                <td colspan="3" class="text-right"><b>TOTAL</b></td>
                                <td class="text-right">&#8369; <?php echo number_format($row['total_amount'], 2); ?></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
=======
<!-- Sales Details -->
<div class="modal fade" id="details<?php echo $row['order_number']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width:75%;">
        <div class="modal-content " style="background-color: rgba(0, 0, 0, .5)" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Sales Full Details</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                   
                   <form method="POST" action="acc_editpaymentstatus.php?status=<?php echo $row['order_number']; ?>" enctype="multipart/form-data">
                   
                    <h5>Table Number: <b><?php echo $row['tblnum']; ?></b>
                        <span class="pull-right">
                           <?php echo date('M d, Y', strtotime($row['date'])) ?>
                        </span>
                    </h5>
                    <table class="table" style="color:black">
                        <thead>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Purchase Quantity</th>
                            <th>Subtotal</th>
                            
                        </thead>
                        <tbody>
                            <?php
                                $sql="select * from orders left join product on product.prod_id=orders.prod_id left join pricing on product.prod_id=pricing.prod_id where order_number='". $row['order_number']."'";
                                $dquery=$conn->query($sql);
                                while($drow=$dquery->fetch_array()){
                                    ?>
                                    <tr>
                                        <td><?php echo $drow['prod_name']; ?></td>
                                        <td class="text-center">&#8369;<?php echo number_format($drow['price'], 2); ?></td>
                                        <td><?php echo $drow['qty']; ?></td>
                                        <td class="text-left">&#8369;
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
                                <td colspan="3" class="text-right"><b>TOTAL</b></td>
                                <td class="text-right">&#8369; <?php echo number_format($row['total_amount'], 2); ?></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="modal-footer">
            
                <button type="submit" class="btn btn-success" id="button1" >Set Status To Paid</button>
                
                <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                </form>
                <form action="acc_edittblstatus.php?table=<?php echo $row['tblnum']; ?>" method="POST" enctype="multipart/form-data" id="button2">
                    <button type="submit" class="btn btn-success" >Update table status</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script> 
    $(document).ready(function(){
    $("#button2").click(function(){
        alert("Table status updated").show();
        
    });
        $("#button1").click(function(){
        alert("Status Updated").show();
    });
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>
>>>>>>> Stashed changes:acc_sales_disp.php
