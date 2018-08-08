<?php
session_start();
require 'connect.php';
 
$action = isset($_GET['a']) ? $_GET['a'] : "";
$itemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
$_SESSION['formid'] = sha1('itoffside.com' . microtime());
if (isset($_SESSION['qty'])) {
	$meQty = 0;
	foreach ($_SESSION['qty'] as $meItem) {
		$meQty = $meQty + $meItem;
	}
} else {
	$meQty = 0;
}
if (isset($_SESSION['cart']) and $itemCount > 0) {
	$itemIds = "";
	foreach ($_SESSION['cart'] as $itemId) {
		$itemIds = $itemIds . $itemId . ",";
	}
	$inputItems = rtrim($itemIds, ",");
	$meSql = "SELECT * FROM products WHERE product_id in ({$inputItems})";
	$meQuery = mysql_query($meSql);
	$meCount = mysql_num_rows($meQuery);
} else {
	$meCount = 0;
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
   
<!--   bower-->
   
    <!-- plugin -->

<!--    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
       
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/fileinput.min.js" type="text/javascript"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js" type="text/javascript"></script>
   
    
    
   <link rel="stylesheet" href="css/demo.css">
	<link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
   
  
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 
</head>
 <script language=Javascript>
        function Inint_AJAX() {
           try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
           try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
           try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
           alert("XMLHttpRequest not supported");
           return null;
        };

        function dochange(src, val) {
             var req = Inint_AJAX();
             req.onreadystatechange = function () { 
                  if (req.readyState==4) {
                       if (req.status==200) {
                            document.getElementById(src).innerHTML=req.responseText; //รับค่ากลับมา
                       } 
                  }
             };
             req.open("GET", "localtion.php?data="+src+"&val="+val); //สร้าง connection
             req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
             req.send(null); //ส่งค่า
        }

        window.onLoad=dochange('province', -1);     
    </script>
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
                        <a href=".php">แจ้งชำระเงิน</a>
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
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">เกี่ยวกับ
                        <strong>คนสร้างเว็บ</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-md-6">
                    <img class="img-responsive img-border-left" src="img/slide-2.png" alt="">
                </div>
                <div class="col-md-6">
                    <p>นายกฏต พัฒนพานิช </p>
                    <p>ศึกษาที่มหาวิทยาลัยราชภัฎรำไพพรรณี คณะวิทยาการคอมพิวเตอร์และเทคโนโลยีสารสนเทศ </p>
                    <p>สาขาวิชา เทคโนโลยีสารสนเทศ รหัสประจำตัวนักศึกษา 5714421001</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

      <div class="container">
 
            <!-- Static navbar -->
            <div class="navbar navbar-default" role="navigation">
                <div class="box">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"></a>
                    </div>
                    <div class="box">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="index.php">หน้าแรกสินค้า</a></li>
                            <li><a href="cart.php">ตะกร้าสินค้าของฉัน <span class="badge"><?php echo $meQty; ?></span></a></li>
                        </ul>
                    
                    </div><!--/.nav-collapse -->
                </div><!--/.container-fluid -->
            </div>
			
            <!-- Main component for a primary marketing message or call to action -->
            <?php
            if ($action == 'removed')
            {
                echo "<div class=\"alert alert-warning\">ลบสินค้าเรียบร้อยแล้ว</div>";
            }
 
            if ($meCount == 0)
            {
                echo "<div class=\"alert alert-warning\">ไม่มีสินค้าอยู่ในตะกร้า</div>";
            } else
            {
                ?>
            
            			 <?php
include ("connect.php");
$strSQL = "SELECT * FROM member where Username = '".$_SESSION['user']."'";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
                            
						<?php
		while($objResult = mysql_fetch_array($objQuery))
		{
		?>
            <form action="updateorder.php" method="post" name="formupdate" role="form" id="formupdate" class="box" onsubmit="JavaScript:return updateSubmit();">
                	
                            <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">รายการสั่งซื้อ
                       
                    </h2>
                    <hr>
                </div>
                            <input type="checkbox" id="pizza" name="pizza" value="yes">
  <label for="pizza">ที่อยู่ตามที่สมัคร</label><br>
  
  <div class="form-group">
    					<label for="exampleInputEmail1">ชื่อ-นามสกุล</label>
                                        <input type="text" class="form-control" id="order_fullname" placeholder="ใส่ชื่อ นามสกุล" style="width: 300px;" name="order_fullname" value="<?=$objResult['Name']?><?=$objResult['Lname']?>">
  					</div>
                	<div class="form-group">
    					<label for="exampleInputAddress">ที่อยู่</label>
    					<textarea class="form-control" rows="3" style="width: 500px;" name="order_address" id="order_address" ><?=$objResult['address']?></textarea>
  					</div>
                	
              
                                
                      <div class="form-group">
    					<label for="exampleInputAddress">จังหวัด</label>
    					 <input type="text" class="form-control" id="order_province"  style="width: 300px;" name="order_province" value="<?=$objResult['province']?>">
  					</div>
            <div class="form-group">
    					<label for="exampleInputAddress">อำเภอ</label>
    					 <input type="text" class="form-control" id="order_amphur"  style="width: 300px;" name="order_amphur" value="<?=$objResult['amphur']?>">
  		<div class="form-group">
    					<label for="exampleInputAddress">ตำบล</label>
    					 <input type="text" class="form-control" id="order_district"  style="width: 300px;" name="order_district" value="<?=$objResult['district']?>">
  					</div>
                
                <div class="form-group">
    					<label for="exampleInputPhone">รหัสไปรษณีย์</label>
    					<input type="text" class="form-control" id="order_zipcode" placeholder="ใส่รหัสไปรษณีย์" style="width: 150px;" name="order_zipcode" value="<?=$objResult['zipcode']?>"  >
  					</div>
                <div class="form-group">
    					<label for="exampleInputPhone">เบอร์โทรศัพท์</label>
                                        <input type="text" class="form-control" id="order_phone" placeholder="ใส่เบอร์โทรศัพท์ที่สามารถติดต่อได้" style="width: 300px;" name="order_phone" value="<?=$objResult['number']?>">
  					</div>
      


            <?php
              }
              ?>
                    <table class="table box">
            
     
                        <thead>
                            <tr>
                                <th>รหัสสินค้า</th>
                                <th>ชื่อสินค้า</th>
                                <th>จำนวน</th>
                                <th>ราคาต่อหน่วย</th>
                                <th>จำนวนเงิน</th>
                            </tr>
                            
                            
                        </thead>
                        <tbody>
                            <?php
                            $total_price = 0;
                            $num = 0;
                            while ($meResult = mysql_fetch_assoc($meQuery))
                            {
                                $key = array_search($meResult['product_id'], $_SESSION['cart']);
                                $total_price = $total_price + ($meResult['product_price'] * $_SESSION['qty'][$key]);
                                ?>
                                <tr>
                                    <td><?php echo $meResult['product_code']; ?></td>
                                    <td><?php echo $meResult['product_name']; ?></td>
                                   
                                    <td>
                                    	<?php echo $_SESSION['qty'][$key]; ?>
                                    	<input type="hidden" name="qty[]" value="<?php echo $_SESSION['qty'][$key]; ?>" />
                                    	<input type="hidden" name="product_id[]" value="<?php echo $meResult['product_id']; ?>" />
                                    	<input  type="hidden" name="product_price[]" value="<?php echo $meResult['product_price']; ?>" />
                                    </td>
                                    <td><?php echo number_format($meResult['product_price'], 2); ?></td>
                                    <td><?php echo number_format(($meResult['product_price'] * $_SESSION['qty'][$key]), 2); ?></td>
                                </tr>
                                <?php
								$num++;
								}
                            ?>
                            <tr>
                                <td colspan="8" style="text-align: right;">
                                    <h4>จำนวนเงินรวมทั้งหมด <?php echo number_format($total_price, 2); ?>  บาท </h4>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="8" style="text-align: right;">
                                	<input type="hidden" name="formid" value="<?php echo $_SESSION['formid']; ?>"/>
                                	<a href="cart.php" type="button" class="btn btn-danger btn-lg">ย้อนกลับ</a>
                                    <button type="submit" class="btn btn-primary btn-lg">บันทึกการสั่งซื้อสินค้า</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                <?php
				}
            ?>
      </div>
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
             
            


</body>

</html>
