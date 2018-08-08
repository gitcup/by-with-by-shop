<?php
session_start();
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


<link href="css/fileinput.min.css" rel="stylesheet" type="text/css"/>
<?php
            if (!isset($_SESSION['user']))
            {
                echo "<div class=\"alert alert-warning\"><p>คุณยังไม่ได้ล็อคอิน โปรดล็อคอิน <span><a href='register.php'>ยังไม่ได้เป็นสมาชิก</a></p> ";
                echo '<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">เข้าสู่ระบบ</button>';
                
                echo '</div>';
                
                
            } else {
                

                 $_SESSION["Status"] = $row["Status"];
                        session_write_close();
			
			if($row["Status"] == "ADMIN")
			{
				 echo"<head><meta http-equiv='Refresh'content = '0; URL = admin_member.php'></head>"; 
			}
			else
			{
				 echo"<head><meta http-equiv='Refresh'content = '0; URL = home.php'></head>";
			}
                
            }
 
//            if ($meCount == 0)
//            {
//                echo "<div class=\"alert alert-warning\">ไม่มีสินค้าอยู่ในตะกร้า</div>";
//            }
            
            ?>

    
      <!-- Modal content-->
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="color:darkcyan;"><span class="glyphicon glyphicon-lock"></span> Log in</h4>
        </div>
        <div class="modal-body">
          <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"><?php if (isset($userError)) { echo $userError; } ?></span> Username</label>
              <input type="text" class="form-control" name="username"  id="Username" placeholder="กรุณาใส่ชื่อผู้ใช้งาน">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"><?php if (isset($passError)) { echo $passError; } ?></span> Password</label>
              <input type="password" class="form-control" name="password"  id="password" placeholder="กรุณาใส่รหัสผ่าน">
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
            <button type="submit" class="btn btn-default btn-success btn-block" name="login" value="Login"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form> 
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> ยกเลิก</button>
          <p>ยังไม่ได้เป็นสมาชิก? <button type="button" class="btn btn-info btn-group-sm" data-toggle="modal" data-target="#myModal2">สมัครสมาชิก</button></p>
         <p>ลืม <a href="#">รหัสผ่าน</a></p>
        </div>
      </div>
    </div>
  </div> 
   
      <!-- Modal content-->
    <div class="modal fade" id="myModal2" role="dialog">
        <div class="modal-dialog">
            
             <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="color:darkcyan;"><span class="glyphicon glyphicon-user"></span>สมัครสมาชิก</h4>
        </div>
        <div class="modal-body">
            <form  name="form" action="loginsuccess.php" method="post" >
                 <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input name="Email" id="Email" type="Email" required autocomplete="off"  class="form-control"  placeholder="กรุณาใส่อีเมลล์">
  </div>
              <div class="form-group">
    <label for="exampleInputPassword1">Username</label>
    <input name="username" type="text" id="Username" type="text" class="form-control"  placeholder="ชื่อผู้ใช้งาน">
  </div>
 
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="password" type="password" id="password" class="form-control"  placeholder="รหัสผ่าน">
  </div>
              <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input name="conpassword" type="password" class="form-control" id="conpassword" placeholder="ยืนยันรหัสผ่าน">
  
  </div>
             <div class="form-group">
    <label for="exampleInputPassword1">ชื่อจริง</label>
    <input name="name" type="text" id="name"  class="form-control"  placeholder="ชื่อจริง" >
    
  </div>
                
    <div class="form-group">
    <label for="exampleInputPassword1">นามสกุล</label>
    <input name="Lname" type="text" id="Lname"  class="form-control"  placeholder="นามสกุล">

  </div>
               <div class="form-group">
    <label for="exampleInputPassword1">เบอร์โทรศัพท์</label>
    <input name="number" type="text" id="number"  class="form-control"  placeholder="เบอร์โทรศัพท์">

  </div>
            
          
           
              <div class="form-group">
    <label for="exampleFormControlTextarea1">ที่อยู่</label>
    <textarea class="form-control" id="address" rows="3" name="address" type="text" id="address"></textarea>
  </div>
                    <div class="form-group">
     <label for="exampleInputPassword1">จังหวัด</label>
    <input name="province" type="text" id="province"  class="form-control"  placeholder="จังหวัด">
  </div>
                <div class="form-group">
     <label for="exampleInputPassword1">ตำบล</label>
    <input name="district" type="text" id="district"  class="form-control"  placeholder="ตำบล">
  </div>
                    <div class="form-group">
     <label for="exampleInputPassword1">อำเภอ</label>
    <input name="amphur" type="text" id="amphur"  class="form-control"  placeholder="อำเภอ">
  </div>
                   <div class="form-group">
     <label for="exampleInputPassword1">รหัสไปรษณีย์</label>
    <input name="zipcode" type="text" id="zipcode"  class="form-control"  placeholder="รหัสไปรษณีย์">
  </div>
  <button type="submit" class="btn btn-primary" name="signup" >ยืนยัน</button>
</form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> ยกเลิก</button>
      
          
        </div>
      </div>
            
        </div>
        </div>
        
      <link href="css/img_file.css" rel="stylesheet" type="text/css"/>
        
        
       
 <?php
	
//	session_start();
	require_once 'connect.php';
//	include_once 'connect.php';
	// it will never let you open index(login) page if session is set
        
//	if ( isset($_SESSION['user'])!="" ) {
//		header("Location: home.php");
//		exit;
//	}
	
	$error = false;
	
	if( isset($_POST['login']) ) {	
		
		// prevent sql injections/ clear user invalid inputs
		$username = trim($_POST['username']);
		$username = strip_tags($username);
		$username = htmlspecialchars($username);
		
		$password = trim($_POST['password']);
		$password = strip_tags($password);
		$password = htmlspecialchars($password);
		// prevent sql injections / clear user invalid inputs
		
		if(empty($username)){
			$error = true;
			$userError = "Please enter your username.";
		}
		
		if(empty($password)){
			$error = true;
			$passError = "Please enter your password.";
		}
		
		// if there's no error, continue to login
		if (!$error) {
//                    $password = hash('sha256', $password);
			include './connect.php';
//                     $result="SELECT * FROM member where Username = '$username' and Password ='$password'";
                       
                   
//			$row=mysql_fetch_array($conn,$res);
//			$count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
			
                        
//                        $result =  mysqli_query($conn,$result);
//                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
//                    $count = mysqli_num_rows($result);
                    
                    $res=mysql_query("SELECT * FROM member where Username = '$username' and Password ='$password'");
			$row=mysql_fetch_array($res);
			$count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
                    
                    if($count==0){
                        
                        
                        echo '<script type="text/javascript">';
  echo 'setTimeout(function () { swal({
  title: "ไม่พบผู้ใช้ในระบบ",
  text: "กรุณาเข้าสู่ระบบอีกครั้ง!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
});';
  echo '}, 1000);</script>';
  
  
                 
                    }
                    else
                    {
                        $_SESSION["user"] = $row["Username"];
                        $_SESSION["Status"] = $row["Status"];
                        session_write_close();
			
			if($row["Status"] == "ADMIN")
			{
				 echo"<head><meta http-equiv='Refresh'content = '0; URL = admin_member.php'></head>"; 
			}
			else
			{
				 echo"<head><meta http-equiv='Refresh'content = '0; URL = home.php'></head>";
			}
	}
	mysql_close();
                      
                    }
                }
		
	
        
        
?>	


<!DOCTYPE html>
<html lang="en">



    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
<script src="bower_components/sweetalert2/dist/sweetalert2.all.min.js"></script>

<!-- Include a polyfill for ES6 Promises (optional) for IE11 and Android browser -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<script src="bower_components/sweetalert2/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="bower_components/sweetalert2/dist/sweetalert2.min.css">

<!--sweetAlert-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

      <title>By With By-ยินดีต้อนรับ</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Test plugin -->
    <link href="css/fileinput.min.css" rel="stylesheet" type="text/css"/>
    <script src="js/fileinput.min.js" type="text/javascript"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/fileinput.min.js" type="text/javascript"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="css/loading.css" rel="stylesheet">
    <link href="css/product.css" rel="stylesheet">
   
</head>  <!--lightbox-->
   <link href="css/lightbox.css" rel="stylesheet" type="text/css"/>



    



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
                    <li>
                        <a href="index.php">หน้าแรก</a>
                    </li>
                    <li>
                        <a href="sell_list.php">สั่งซื้อสินค้า</a>
                    </li>
                    <li>
                        <a href="register.php">สมัครสมาชิก</a>
                    </li>
                    <li>
                        <a href="contact.php">ติดต่อเรา</a>
                    </li>
<!--                     <li>
                        <a href="payment.php">ยอดการโอน</a>
                    </li>-->
                       
                </ul>
            </div>
          
  
   
    
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
                        <a class="left carousel-control"  data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control"  data-slide="next">
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
        
        
       <div class="container" align="center">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">รายการสินค้า
<!--                        <strong>คือ อะไรกันนะ? </strong>-->
                    </h2>
                    <hr>
                      <div id="products" class="row list-group">
                 
            


                   
               <?php
                    while ($meResult = mysql_fetch_assoc($meQuery))
                    {
                        ?>
                    
<!--                           <form method="post" action="index.php?action=add&code=<?php echo $meResult['product_code'];  ?>">
                   
                             <div><strong><?php echo $meResult['product_name']; ?></strong></div>
                             <div class="product-image"><img src="img/<?php echo $meResult['product_img_name']; ?>"border="0" width="100" height="100"></div>
                            <div class="product-price"><?php echo number_format($meResult['product_price'],2); ?></div>
                            
                            
                            
	</form>-->
                         
        <div class="col-lg-12 col-lg-6" align="center">
            <div class="thumbnail">
                <a class="example-image-link" href="img/img_product/<?php echo  $meResult['product_img_name']; ?>"data-lightbox="example-1" data-title="ชื่อไฟล์:<?php echo  $meResult['product_img_name']; ?>"><img class="example-image" src="img/img_product/<?php echo  $meResult['product_img_name']; ?>"alt="image-1" border="0" width="100" height="100" /></a>
                <div class="caption">
                    <h4 class="group inner list-group-item-heading">
                       <?php echo $meResult['product_name']; ?></h4>
                    <p class="group inner list-group-item-text" >
                      <?php echo $meResult['product_desc']; ?></p>
                    <div class="row">
                      
                            <p class="lead">
                                <?php echo number_format($meResult['product_price'],2); ?> บาท </p>
                       
                        <div><br><a class="btn btn-success" href="updatecart.php?itemId=<?php echo $meResult['product_id']; ?>" role="button">
                                    <span class="glyphicon glyphicon-shopping-cart"></span>
                                    <br>หยิบใส่ตะกร้า</a></div>
                    </div>
                </div>
            </div>
        </div>
                    
                        <?php
                    }
                    ?> </p>
                  
                </div>
            </div>
        </div>
       
             
                    
              
               
           
       

        <div class="container" align="center">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">ภาษา PHP
                        <strong>คือ อะไรกันนะ? </strong>
                    </h2>
                    <hr>
                                     <p>ธรรมชาติ และพฤติกรรมในตัวเรา
กว่าจะปรับเปลี่ยน กว่าจะเชื่ออะไรได้สักอย่างยากมาก
ยิ่งถ้าไม่มีโฆษณาเข้ามาชวนเชื่อ มันอาจล้มไม่เป็นท่า
เราทำ เราใช้ และคงไม่เลิกทำ 
เพราะเท่าที่ผ่านมา เราแสวงหาความเป็นไปที่จะมาตอบโจทก์ ไม่ต่างกัน
ขอให้มีความสุข กับ การสัมผัสธรรมชาติค่ะ 
                    <p>อ้างอิง:<a href="http://www.hellomyweb.com" target="_blank">www.hellomyweb.com</a>  </p>
                </div>
            </div>
        </div>

    </div>
                 </div>
            
    <!-- /.container -->
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

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
    
    <script src="js/loader.js"></script>
<script src="js/showm1.js" ></script>


</body>
<script src="js/lightbox.js" type="text/javascript"></script>
</html>
