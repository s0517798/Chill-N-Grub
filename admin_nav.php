
<!DOCTYPE html>
<nav class="navbar navbar-dark navbar-fixed-top" style="background: #ff9900; margin-top: 10px; font-family: corbel; border:solid white;">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="img/logo.png" style="height: 50px; width: 50px; margin-top: -13px; border-radius: 50px; "></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="admin.php" style=" color: black;">Home <span class="sr-only">(current)</span></a></li>
                <li><a href="admin_sales_search.php" style=" color: black;">Sales<span class="sr-only">(current)</span></a></li>
                <li><a href="admin_sales.php" style="color: black;">Orders<span class="sr-only">(current)</span></a></li>
                <li><a href="admin_product.php" style="color: black;">Products<span class="sr-only">(current)</span></a></li>
                <li><a href="admin_category.php" style=" color: black;">Category<span class="sr-only">(current)</span></a></li>
                <li><a href="admin_mesa.php" style=" color: black;">Tables<span class="sr-only">(current)</span></a></li>
                <li><a href="admin_accounts.php" style=" color: black;">User Accounts<span class="sr-only">(current)</span></a></li>
                <li><a href="logout.php" style=" color: black;" id="logout">Log out<span class="sr-only">(current)</span></a></li>


                
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<?php
include_once "heading.php";
?>
<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="bs/index.css">
    <link rel="stylesheet" type="text/css" href="bs/admin_nav.css">
    <link rel="stylesheet" type="text/css" href="bs/scrollbar.css">
</head>
<script>
    $(document).ready(function(){
    $("#logout").click(function(){
        alert("Are you sure to log out?").show();
        
    });
    });
</script>