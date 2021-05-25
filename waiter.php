<?php
session_start();

if(isset($_SESSION['usertype']) && isset($_SESSION['userid'])){
    switch($_SESSION['usertype']){
        case 'A' : break;
        case 'C' : break;
        case 'W' : header("location: ");
            break;  
    }
}
else{
    header("location: index.php");
}
include_once "includes/functions.php";
?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="bs/bootstrap.min.css">
    <link rel="stylesheet"  href="bs/waiter.css">

</head>
<body>
   <div >
    <form action="logout.php" >
        <button type="submit" class="btn btn-outline-warning pull-right" name="logout">Log out</button>
        </form>
        </div>
    <div class="container">
        <h2>Waiter Section</h2>
       
    <div class="row mt-3">
       <?php
        include_once "includes/db_conn.php";
        
        $display_tbl_sql = "SELECT * FROM `mesa`";

		$result = mysqli_query($conn,$display_tbl_sql);
		if(mysqli_num_rows($result) > 0)
		{
			while($tble_info = mysqli_fetch_assoc($result)){ ?>
                
                <div class="col-3">
                    <div class="card">
                        <h3 class="card-title mx-3">
                        Table <?php echo $tble_info['tbnum'];?>
                        <br>
                        <a href="img/qr/<?php echo $tble_info['qr_img_file'];?>" class="btn btn-primary">Seat Here</a>
                        
                        </h3>
                        <div class="card-body">
                             <?php switch($tble_info['status']){
                case 'A': echo "<p class='text-success'> Available </p>" ;
                    break;
                case 'O': echo "<p class='text-danger'> Occupied </p>"; 
                    break;                  
                                   }?>
                        </div>
                        
                    </div>
                </div>
                
                
            <?php }
		}
        ?>
    </div>
</div>



</body>
	<script src="bs/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script>
    $(document).ready(function(){
    $("button").click(function(){
        alert("Are you sure to log out?").show();
        
    });
    });
    </script>
</html>

