
<!-- Sales Details -->
<div class="modal fade" id="details<?php echo $row['od_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width:75%;">
        <div class="modal-content " style="background-color: rgba(0, 0, 0, .5)" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Sales Full Details</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                   
                   <form method="POST" action="acc_editpaymentstatus.php?status=<?php echo $row['od_id']; ?>" enctype="multipart/form-data">
                   
                    <h5>Table Number: <b><?php echo $row['tblnum']; ?></b>
                        <span class="pull-right">
                           <?php echo date('M d, Y h:i A', strtotime($row['date'])) ?>
                        </span>
                    </h5>
                    <table class="table" style="color:red">
                        <thead>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Purchase Quantity</th>
                            <th>Payment Status (P for paid U for !paid)</th>
                            <th>Subtotal</th>
                            
                        </thead>
                        <tbody>
                            <?php
                                $sql="select * from orders left join product on product.prod_id=orders.prod_id left join pricing on product.prod_id=pricing.prod_id where od_id='". $row['od_id']."'";
                                $dquery=$conn->query($sql);
                                while($drow=$dquery->fetch_array()){
                                    ?>
                                    <tr>
                                        <td><?php echo $drow['prod_name']; ?></td>
                                        <td class="text-center">&#8369;<?php echo number_format($drow['price'], 2); ?></td>
                                        <td><?php echo $drow['qty']; ?></td>
                                        <td><?php echo $row['stat']; ?></td>
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
            
                <button type="submit" class="btn btn-success" >Set Status To Paid</button>
                
                <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
