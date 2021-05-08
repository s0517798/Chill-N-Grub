<?php
session_start();
$_SESSION['tbnum']=1;

include ("includes/db_conn.php");

?>

<html>
<head>
    <title></title>
    <link rel="stylesheet" href="bs/bootstrap.min.css">
    <link rel="stylesheet" href="font/bootstrap-icons.css">
    </head>
<body>
    <div class="container-fluid">
    <div class="row">
    <div class="col-50 mt-3">
        <?php
        $sql = "SELECT pr.prod_name,pr.prod_img, p.price, c.cat_desc
		FROM product as pr
		JOIN pricing as p
		ON pr.prod_id = p.prod_id
        JOIN category as c
        ON pr.cat_id = c.cat_id;";
        	$stmt=mysqli_stmt_init($conn);
						if (!mysqli_stmt_prepare($stmt, $sql)){
							echo "Statement Failed.";
							exit();
						}

						mysqli_stmt_execute($stmt);
						$resultData = mysqli_stmt_get_result($stmt);
						$arr=array();
						while($row = mysqli_fetch_assoc($resultData)){
							array_push($arr,$row);
						}
						
                         //  echo "<table class ='table'>";
                        ?>
        
                            <div class="container">
                            <div class="row">
                            
                         <?php
                        foreach($arr as $key => $val){ ?>
                                
                                <div class="card col-3">
                                    <img src="img/<?php echo $val['prod_img']; ?>" alt="" class="card-img-top">
                                    <div class="card-body">       
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $val['prod_name'];?></h5>
                                    <p class="card-text"><?php echo $val['cat_desc'];?></p>
                                <p class=card-text> &#8369;<?php echo $val['price'];?></p>    
                                </div>
                                
                                <div class="card-footer">
                                        <form action="includes/processing.php" method="get">
                                      <input hidden type="text" name="prod_id" value='<?php echo $val['prod_id'];?>'>
                                        <div class="input-group">
                                        <input class="form-control" type="number" name="item_qty" value="">
                                            <button type = "submit"class="btn btn-primary"> <i class="bi bi-cart-plus"></i></button>
                                        </div>
                                    </form>
                                            </div>
                                    </div>
                                </div>
                                
               <!--             echo "<tr>";
							echo "<td>" . $val['prod_name'] . "</td>" ;
							echo "<td>" . $val['cat_desc'] . "</td>";
                            echo "<td>" . $val['price'] . "</td>";
                            echo "</tr>";-->
                            
						
                           <?php
                                }
                                echo "</div>";
                                echo "</div>";
                                
                            ?>
    
        
         </div>
        </div>
          </div>
        <div class="col-10"></div>
                              
        </div>
        </div>
    </body>
<script src="bs/bootstrap.min.js"></script>
</html>
