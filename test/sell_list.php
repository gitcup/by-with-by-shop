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
//unset($_SESSION['qty']); ลบข้อมูลที่ค้าง
//unset($_SESSION['cart']);
?>

<?php


 

            if (!isset($_SESSION['user']))
            {
                echo "<div class=\"alert alert-warning\">คุณยังไม่ได้ล็อคอิน โปรดล็อคอิน</div>";
                header("Location: index.php");
            }
 
//            if ($meCount == 0)
//            {
//                echo "<div class=\"alert alert-warning\">ไม่มีสินค้าอยู่ในตะกร้า</div>";
//            }
          
 
 
 
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
    <link href="css/sell.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
     <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,700&subset=latin-ext" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    
   <!-- script js -->
        <script src="sell.js"></script>
       
    <link rel="stylesheet" href="css/demo.css">
	<link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
   
  <script src="js/form.js"></script>

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
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">สินค้าแนะนำ
                    </h2>
                    <hr>
                </div>
                <div class="col-md-6">
                    <img class="img-responsive img-border-left" src="img/recommed.png" width="250" height="300">
                </div>
                <div class="col-md-6">
                    <p>แชมพูคาร์บอน</p>
                    <p>- ธรรมชาติให้อาหารเส้นผม และ บำรุงหนังศีรษะ </p>
                    
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

      
 
            
            <div class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Shopping Cart - ItOffside.com</a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <h3 align="center">รายการสินค้า</h3>
                            
                           
                            <li><a href="cart.php"><img src="img/shop.png" width="50" height="50"alt=""/>ตะกร้าสินค้าของฉัน <span class="badge"><?php echo $meQty; ?></span></a></li>
                        </ul>
                    </div>
                </div>
            
            
            <!-- Main component for a primary marketing message or call to action -->
 
           
<?php
if($action == 'exists'){
    echo "<div class=\"alert alert-warning\">เพิ่มจำนวนสินค้าแล้ว</div>";
}
if($action == 'add'){
    echo "<div class=\"alert alert-success\">เพิ่มสินค้าลงในตะกร้าเรียบร้อยแล้ว</div>";
}
if($action == 'order'){
	echo "<div class=\"alert alert-success\">สั่งซื้อสินค้าเรียบร้อยแล้ว</div>";
}
if($action == 'orderfail'){
	echo "<div class=\"alert alert-warning\">สั่งซื้อสินค้าไม่สำเร็จ มีข้อผิดพลาดเกิดขึ้นกรุณาลองใหม่อีกครั้ง</div>";
}
?>
          
     
            
            <table class="table box">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>รหัสสินค้า</th>
                        <th>ชื่อสินค้า</th>
                        <th>รายละเอียด</th>
                        <th>ราคา</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                    while ($meResult = mysql_fetch_assoc($meQuery))
                    {
                        ?>
                        <tr>
                            <td><img src="img/img_product/<?php echo $meResult['product_img_name']; ?>" border="0" width="100" height="100"></td></td>
                            <td><?php echo $meResult['product_code']; ?></td>
                            <td><?php echo $meResult['product_name']; ?></td>
                            <td><?php echo $meResult['product_desc']; ?></td>
                            <td><?php echo number_format($meResult['product_price'],2); ?></td>
                            <td>
                                <a class="btn btn-primary btn-lg" href="updatecart.php?itemId=<?php echo $meResult['product_id']; ?>" role="button">
                                    <span class="glyphicon glyphicon-shopping-cart"></span>
                                    หยิบใส่ตะกร้า</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
 
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,700&subset=latin-ext" rel="stylesheet">
 
 

      
        </div>

    </div>
    <!-- /.container -->

   <footer class="footer-distributed">

			<div class="footer-left">

				<h3>Company<span>logo</span></h3>

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
					<p><a href="mailto:support@company.com">support@company.com</a></p>
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

</body>

</html>

<?php
mysql_close();
?>










