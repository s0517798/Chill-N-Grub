<!-- Add Account -->
<div class="modal fade" id="add_acc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Add New Account</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="admin_add_acc.php" enctype="multipart/form-data">
                    <div class="form-group" style="margin-top:10px;">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Username:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="uname" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Password:</label>
                            </div>
                            <div class="col-md-9">
                              <input type="password" id="password" data-toggle="password" class="form-control" name="pword" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">User Type</label>
                            </div>
                            <div class="col-md-9">
                                <select name="utype" class="form-control">
                                  <option value="C">Accountant</option>
                                  <option value="A">Admin</option>
                                  <option value="W">Waiter</option>
                                </select>
                            </div>
                        </div>
                    </div>
                   
                </div>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Save</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<!-- Edit Account -->

<div class="modal fade" id="edit_acc<?php echo $row['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit Account</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="admin_edit_acc.php? account=<?php echo $row['user_id']; ?>" enctype="multipart/form-data">
                    <div class="form-group" style="margin-top:10px;">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Userame:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="<?php echo $row['user_name']; ?>" name="uname">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Password:</label>
                            </div>
                            <div class="col-md-9">
                              <input type="password" id="password" data-toggle="password" class="form-control" name="pword" value="<?php echo $row['password']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">User Type</label>
                            </div>
                            <div class="col-md-9">
                                <select name="utype" class="form-control">
                                 <option value="<?php echo $row['usertype']; ?>"><?php switch($row['usertype']){
                                 case 'C': echo "Accountant" ;
                                    break;
                                 case 'A': echo "Admin"; 
                                    break; 
                                 case 'W': echo "Waiter"; 
                                    break; 
                                   }?>
                                 </option>
                                  <option value="C">Accountant</option>
                                  <option value="A">Admin</option>
                                  <option value="W">Waiter</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                </div>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Update</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Delete Account -->
<div class="modal fade" id="del_acc<?php echo $row['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete Account</h4></center>
            </div>
            <div class="modal-body">
                <h3 class="text-center"><?php echo $row['user_name']; ?></h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                <a href="admin_del_acc.php?account=<?php echo $row['user_id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<script type="text/javascript">
	$("#password").password('toggle');
</script>