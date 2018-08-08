<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
include_once 'connect.php';
$sql = "select * from province ";
$query = mysql_query($sql);
?>

       
<?php
ob_start();
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

 
    
   <?php



?>
  


  <?php


if(isset($_SESSION['UserID'])) {
    header("Location: index.php");
}

 include_once 'connect.php';
//set validation error flag as false
$error = false;



?>



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
				header("location:admin_member.php");
			}
			else
			{
				header("location:home.php");
			}
	}
	mysql_close();
                      
                    }
                }
		
	
        
        
?>	




    
   






 
<!DOCTYPE html>
<html lang="en">
    <head>

    <link rel="import" href="header.php">
    
</head>


<body>

    <div class="brand">By With By</div>
    <div class="address-bar">Chanthaburi | 22000 | Tumbon.chanthanimit</div>

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
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
                      
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">
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

       
             <div class="col-lg-12" >
                    <hr align="left">
                    <h2 class="intro-text text-left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;สมัคสมาชิก
                       
                    </h2>
                    <hr align="left">
                </div>
        <form  action="loginsuccess.php"name="form"  method="post" role="form" class="box" >
                 <div class="col-lg-12" >
    <label for="exampleInputPassword1">อีเมล</label>
    <input name="Email" id="Email" type="Email" required autocomplete="off"  class="form-control"  placeholder="กรุณาใส่อีเมลล์" style="width:300px;" >
  </div>
              <div class="col-lg-4">
    <label for="exampleInputPassword1">ชื่อผู้ใช้งานในระบบ</label>
    <input name="username" type="text" id="Username" type="text" class="form-control"  placeholder="ชื่อผู้ใช้งาน" style="width:300px;">
  </div>
 
  <div class="col-lg-12">
    <label for="exampleInputPassword1">รหัสผ่าน</label>
    <input name="password" type="password" id="password" class="form-control"  placeholder="รหัสผ่าน" style="width:300px;">
  </div>
              <div class="col-lg-12">
    <label for="exampleInputPassword1">ยืนยันรหัสผ่าน</label>
    <input name="conpassword" type="password" class="form-control" id="conpassword" placeholder="ยืนยันรหัสผ่าน" style="width:300px;">
  
  </div>
             <div class="col-lg-12">
    <label for="exampleInputPassword1">ชื่อจริง</label>
    <input name="name" type="text" id="name"  class="form-control"  placeholder="ชื่อจริง"   style="width:300px;">
    
  </div>
                
    <div class="col-lg-12">
    <label for="exampleInputPassword1">นามสกุล</label>
    <input name="Lname" type="text" id="Lname"  class="form-control"  placeholder="นามสกุล"style="width:300px;">

  </div>
               <div class="col-lg-12">
    <label for="exampleInputPassword1">เบอร์โทรศัพท์</label>
    <input name="number" type="text" id="number"  class="form-control"  placeholder="เบอร์โทรศัพท์"style="width:300px;">

  </div>
            
          
           
              <div class="col-lg-12">
    <label for="exampleFormControlTextarea1">ที่อยู่</label>
    <textarea class="form-control" id="address" rows="3" name="address" type="text" id="address" style="width:300px;"></textarea>
  </div>
            
           <div class="col-lg-12">
    <label for="exampleInputPassword1">จังหวัด</label>
    <input type="text" id="province" name="province" class="form-control" placeholder="จังหวัด" style="width:300px;">

  </div>
            <div class="col-lg-12">
    <label for="exampleInputPassword1">ตำบล</label>
    <input name="district" type="text" id="district"  class="form-control"  placeholder="ตำบล" style="width:300px;">

  </div>
             <div class="col-lg-12">
    <label for="exampleInputPassword1">อำเภอ</label>
    <input name="amphur" type="text" id="amphur"  class="form-control"  placeholder="อำเภอ" style="width:300px;">

  </div>
            <div class="col-lg-12">
    <label for="exampleInputPassword1">รหัสไปรษณีย์</label>
    <input name="zipcode" type="text" id="zipcode"  class="form-control"  placeholder="รหัสไปรษณีย์" style="width:300px;">

  </div>
            <div class="col-lg-12">
  <br><button type="submit" class="btn btn-primary" name="signup" >ยืนยัน</button>
  </div>
</form>
       
        
        
        

        
       
        

    </div>
        
    <!-- /.container -->

 
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
    <script src="js/form.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    
    </script>

</body>
 <link type="text/css" rel="stylesheet" href="css/jquery.autocomplete.css" />
        <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="js/jquery.autocomplete.js"></script>
        <script type="text/javascript">
            
            var states =  [
<?php
$province = "";
while ($result = mysql_fetch_array($query4)) {
    $province .= "'" . $result['PROVINCE_NAME'] . "',";
}
echo rtrim($province, ",");
?>
            ];
            $(function () {
                $("input").autocomplete({
                    source: [states]
                });
            });
        </script>
        <style>
            .xdsoft_autocomplete_dropdown{
                padding: 10px;
            }
        </style>
</html>
<?php ob_end_flush(); ?>
