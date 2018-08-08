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

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                <a class="navbar-brand" href="index.php"></a>
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
                        <a href=".php">การบ้าน</a>
                    </li>
                    <li>
                        <a href="contact.php">ติดต่อเรา</a>
                    </li>
                       <li><a href="cart.php">ตะกร้าสินค้าของฉัน <span class="badge"><?php echo $meQty; ?></span></a></li>
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
                    <h2 class="intro-text text-center">การบ้าน
                        <strong>สัปดาห์ที่ 3</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-lg-12 text-center">
                    <img class="img-responsive img-border img-full" src="img/slide.png" alt="">
                    <h2>พื้นฐานการใช้งาน jQuery
                        <br>
                        <small>Febuary 4, 2016</small>
                    </h2>
                    <p>ดาวน์โหลด jQuery
เราสามารถดาวน์โหลด jQuery ได้ที่นี่เลยครับ</p>
                    <a href="work1.php" class="btn btn-default btn-lg">ดูเพิ่ม</a>
                    <hr>
                </div>
                
                <div class="col-lg-12 text-center">
                    <img class="img-responsive img-border img-full" src="img/slide-2.png" alt="">
                      <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">การบ้าน
                        <strong>สัปดาห์ที่ 4</strong>
                    </h2>
                    <hr>
                </div>
                    <h2>พื้นฐานการใช้ภาษาสคริปท์ PHP
                        <br>
                        <small>Febuary 28, 2016</small>
                    </h2>
                    <p>การใช้ภาษา PHP เบื้องต้น รวมทั้งการใช้ฟังก์ชั่น การวิเคราะห์เกรด และน้ำหนัก </p>
                    
                    <a href="work2.php" class="btn btn-default btn-lg" >ดูเพิ่ม</a>
                    <hr>
                </div>
                
                 <div class="col-lg-12 text-center">
                    <img class="img-responsive img-border img-full" src="img/slide-3.png" alt="">
                      <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">การบ้าน
                        <strong>สัปดาห์ที่ 5</strong>
                    </h2>
                    <hr>
                </div>
                    <h2>การสร้างแบบฟอร์มด้วย โค้ด PHP
                        <br>
                        <small>March 7, 2016</small>
                    </h2>
                    <p>การใช้ภาษา PHP เบื้องต้น เพื่อสร้างแบบฟอร์มในการกรอกข้อมูล </p>
                    
                    <a href="work3.php"  class="btn btn-default btn-lg" >ดูเพิ่ม</a>
                    <hr>
                </div>
                
                
                
                
                
                
                
                
                
                <div class="col-lg-12 text-center">
                    <ul class="pager">
                        <li class="previous"><a href="#">&larr; Older</a>
                        </li>
                        <li class="next"><a href="#">Newer &rarr;</a>
                        </li>
                    </ul>
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
