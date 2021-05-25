
<body>
    <style>
    body{
        background: 	#110909;
    }
</style>
<nav class="navbar navbar-default navbar-fixed-top" style="background:#ff9900;">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" img src="img/">
              <div class="logo-image">
                <img src="img/logo.png" style="width: 60px;
                                                height: 60px;
                                               border-radius: 50%;
                                               overflow: hidden;
                                               margin-top: -19px;"class="img-fluid">
                </div>
            
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav" style="font-size:25px; font-family:georgia; ">
               
                <li><a href="accountant.php" style="color:white;">Home<span class="sr-only">(current)</span></a></li>
                <li><a href="acc_sales.php" style="color:white;">Orders<span class="sr-only">(current)</span></a></li>
                <li><a class="logout" href="logout.php" style="color:white;" id="logout">Logout<span class="sr-only">(current)</span></a></li>
            </ul>
 </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->


</nav>

</body>   
<script>
    $(document).ready(function(){
    $("#logout").click(function(){
        alert("Are you sure to log out?").show();
        
    });
    });
</script>
