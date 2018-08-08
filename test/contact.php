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

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

      <title>By With By-ยินดีต้อนรับ</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

   
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    
  

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
                   <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
     <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $_SESSION['user']; ?>&nbsp;<span class="caret"></span></a>
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
                        <a href="contact.php">ติดต่อเรา</a>
                    </li>
                       <li><a href="cart.php">ตะกร้าสินค้าของฉัน <span class="badge"><?php echo $meQty; ?></span></a></li>
                       <li><a href="logout.php?logout" > <span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">ติดต่อ
                        <strong>By With By</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-md-8">
                    <!-- Embedded Google Map using an iframe - to select your location find it on Google maps and paste the link as the iframe src. If you want to use the Google Maps API instead then have at it! -->
                    <iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src=https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3893.4033981406274!2d102.11753331479852!3d12.621520225878156!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310483d5054f0c81%3A0x5a1046b119dde866!2z4LiI4Lix4LiZ4LiX4LiZ4Li04Lih4Li04LiV4Lij!5e0!3m2!1sth!2sth!4v1461164741300"></iframe>
                </div>
                <div class="col-md-4">
                    <p>เบอร์โทรศัพท์:
                        <strong>091-4084258</strong>
                    </p>
                    <p>อีเมล:
                        <strong><a href="gitcup@gmail.com">gitcup@gmail.com</a></strong>
                    </p>
                    <p>ที่อยู่:
                        <strong>14/2 M.7 
                            <br>T.chanthanimit A.muang</strong>
                    </p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">แบบฟอร์ม
                        <strong>ติดต่อ</strong>
                    </h2>
                    <hr>
                    <p>กรอกข้อมูลเพื่อให้เราติดต่อกลับหรือต้องการข้อมูลเพิ่มเติมได้ข้างล่างนี้</p>
                    <form role="form" action="add_contact.php" >
                      
                        
                            <div class="row">
                                
                            <div class="form-group col-lg-4" >
                                <label>ชื่อ</label>
                                <input type="text" name="m_name" id="m_name" class="form-control">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>อีเมล</label>
                                <input type="Email" name="m_Email" id="m_Email" class="form-control">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>เบอร์โทรศัพท์</label>
                                <input type="tel" name="m_tel" id="m_tel" class="form-control">
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-lg-12">
                                <label>ข้อความ</label>
                                <textarea class="form-control" rows="6" name="m_message" id="m_message"></textarea>
                            </div>
                            <div class="form-group col-lg-12">
                                <input type="hidden" name="save" value="contact">
                                <button type="submit" class="btn btn-default">ตกลง</button>
                               
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>By With By 2017</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
