<?php
	ob_start();
	session_start();
	require_once 'connect.php';
	
	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}
	// select loggedin users detail
        $res=mysql_query("SELECT * FROM member WHERE UserID=".$_SESSION['user']);
//	$userRow=mysql_fetch_array($res);
?>

<?php


require 'connect.php';
 
$meSql = "SELECT * FROM products ";

$meQuery = mysql_query($meSql);
 
$action = isset($_GET['a']) ? $_GET['a'] : "";
$itemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
if(isset($_SESSION['qty'])){
    $meQty = 0;
    foreach($_SESSION['qty'] as $meItem){
        $meQty = $meQty + $meItem;
    }
}else{
    $meQty=0;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="import" href="header.php">
</head>

<body>
    

<!-- <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://www.codingcage.com">Coding Cage</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="http://www.codingcage.com/2015/01/user-registration-and-login-script-using-php-mysql.html">Back to Article</a></li>
            <li><a href="http://www.codingcage.com/search/label/jQuery">jQuery</a></li>
            <li><a href="http://www.codingcage.com/search/label/PHP">PHP</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
     <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $userRow['Username']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
          </ul>
        </div>/.nav-collapse 
      </div>
    </nav> -->
<!--<input type="submit" value="" />-->
 <div class="brand">By With By</div>
    <div class="address-bar">Chanthaburi | 22000 | Tumbon.chanthanimit</div>

  <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container" >
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.php">Business Casual</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                   <li class="dropdown">
                       <a href="home.php"  >
     <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $_SESSION['user']; ?>&nbsp;</a>
            </li>
                    <li>
                        <a href="sell_list.php">สั่งซื้อสินค้า</a>
                    </li>
                    <ul class="dropdown-menu">
                    <li><a href=".php">สมัครสมาชิก</a></li>
                       <li><a href="logout.php">ออกจากระบบ</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                    </ul>
                    <li>
                        <a href="payment.php">แจ้งชำระเงิน</a>
                    </li>
                       <li><a href="cart.php">ตะกร้าสินค้าของฉัน <span class="badge"><?php echo $meQty; ?></span></a></li>
                       <li><a href="logout.php?logout" id="nav-logout" > <span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
                </ul>
            </div>
          <script src="http://tristanedwards.me/u/SweetAlert/lib/sweet-alert.js"></script>
<link href="http://tristanedwards.me/u/SweetAlert/lib/sweet-alert.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
            <script>
  $("#nav-logout").click(function(e) {
  e.preventDefault()
    swal({
		title : "",
		text : "คุณต้องการออกจากระบบหรือไม่?",
        type : "warning",
        showCancelButton: true,
        confirmButtonText: "Yes",
        
   },
function(isConfirm){
  if (isConfirm) {
      //window.location="logut page url"; // if you need redirect page 
    window.location = "logout.php?logout";
  } else {
//	    alert("ยกเลิก");
  }
    })
});
   
     </script>
  </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

   
<div class="container">
<script language="Javascript">

</script>
        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    <div id="carousel-example-generic" class="carousel slide">
                        <!-- Indicators -->
                        <ol class="carousel-indicators hidden-xs">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="img-responsive img-full" src="img/wall.png" alt="">
                            
                            </div>
                             
                                 <div class="item">
        <img src="img/ปกเว็บ.jpg" alt="Chicago" style="width:100%;">
      </div>
                            
                            
                           
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                    
            
                    
                    <h2 class="brand-before">
                        <small>Welcome to</small>
                    </h2>
                    <h1 class="brand-name">By With By</h1>
                    <hr class="tagline-divider">
                    <h2>
                        <small>By
                            <strong>Krit pattanapanich</strong>
                        </small>
                    </h2>
                </div>
            </div>
        </div>
            
          
<div class="container">
<script language="Javascript">

</script>
       

  <div class="row">
            <div class="box" >
                <div class="col-lg-12" align="center">
                    <hr>
                    <h2 class="intro-text text-center">ยินดีต้อนรับคุณ <?php   echo $_SESSION["user"];?>
                        
                    </h2>
                    <hr>
<!--                    <img class="img-responsive img-border img-left" src="img/intro.png" alt="">-->
                    <hr class="visible-xs">
                    <p>ขอบคุณที่เป็นส่วนหนึ่งกับ By With By </p>
                    <p>หากท่านต้องการเยี่ยมชมร้านค้า สามารถเลือกที่เมนู "สั่งซิ้อสินค้า"</p>
                    <p><a href="sell_list.php"target="_blank">กดเลย!</a></p>
                  
                    
                    
               
                </div>
            </div>
        </div>
</div>

<link rel="stylesheet" href="css/demo.css">
	<link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
<footer class="footer-distributed">

			<div class="footer-left">

				<h3>By With By</h3>

				<p class="footer-links">
                                    <a href="home.php">Home</a>
					·
                                        <a href="sell_list.php">สั่งซื้อสินค้า</a>
					·
					<a href="">Pricing</a>
					·
					<a href="#">About</a>
					·
					<a href="#">Faq</a>
					·
                                        <a href="contact.php">ติดต่อเรา</a>
				</p>

				<p class="footer-company-name">Bt with By &copy; 2017</p>
			</div>

			<div class="footer-center">

				<div>
					<i class="fa fa-map-marker"></i>
					<p><span>14/2 m.7 Tumbon.Chanthanimit</span> Chanthaburi, Thailand</p>
				</div>

				<div>
					<i class="fa fa-phone"></i>
					<p>080-636-4497</p>
				</div>

				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:support@company.com">gitcupandg@gmail.com</a></p>
				</div>

			</div>

			<div class="footer-right">

				<p class="footer-company-about">
					<span>เกี่ยวกับ By with By</span>
					ผลิตภัณฑ์ธรรมชาติผสมผสานเพื่อให้เกิดประโยชน์และปรับความสมดุล.
				</p>

				<div class="footer-icons">

					<a href="https://www.facebook.com/Bywithby/"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="#"><i class="fa fa-github"></i></a>

				</div>

			</div>

		</footer>



<!--<div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="http://www.codingcage.com/2015/01/user-registration-and-login-script-using-php-mysql.html">Back to Article</a></li>
            <li><a href="http://www.codingcage.com/search/label/jQuery">jQuery</a></li>
            <li><a href="http://www.codingcage.com/search/label/PHP">PHP</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $_SESSION['user']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
          </ul>
        </div>/.nav-collapse 
      -->





 
    
    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  
</body>
</html>
<?php ob_end_flush(); ?>