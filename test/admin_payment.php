<?php
	include"./class/order_admin_payment.class.php";
	
	//new database
	$db = new Database();
	
	if(isset($_POST['search_orderdetail'])){
		//get search order
		$get_orderdetail = $db->search_orderdetail($_POST['search_orderdetail']);
		
	}else{
		
		//call method getUser
		$get_orderdetail = $db->get_all_order_detail();
	}

?>


<?php

require 'connect.php';
 
$meSql = "SELECT * FROM orders ";
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
 $connect = mysqli_connect("localhost", "root", "", "s5714421001");  
 if(isset($_POST["upload"]))  
 {  
     $file = $_FILES['image']['name'];
      $query = "UPDATE INTO products(product_img_name) VALUES ('$file')";  
      if(mysqli_query($connect, $query))  
      {  
           echo '<script>alert("เพิ่มรูปภาพลงฐานข้อมูลเรียบร้อย")</script>';
        
      }  
 }
?>
<?php
            if (!isset($_SESSION['user']))
            {
                echo "<div class=\"alert alert-warning\"><a href='register.php#login'>คุณยังไม่ได้ล็อคอิน โปรดล็อคอิน</a> </div>";
                
                
                
                
                
            }
 
           
//            if ($meCount == 0)
//            {
//                echo "<div class=\"alert alert-warning\">ไม่มีสินค้าอยู่ในตะกร้า</div>";
//            }
            
            ?>
<!DOCTYPE html>
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

      <title>By With By-ยอดการชำระเงิน</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">
   <link rel="stylesheet" href="css/demo.css">
	<link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--lightbox-->
    <link href="css/lightbox.css" rel="stylesheet" type="text/css"/>
    
    <script type="text/javascript">
<!--
    function showImage(){
        document.getElementById('loadingImage').style.visibility="visible";
    }

    -->

    </script>
</head>

<body>

    



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
<!--                      <li>
                        <a href="index.php">หน้าแรก</a>
                    </li>-->
 <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
     <span class="glyphicon glyphicon-user"></span>&nbsp;Admin' <?php echo $_SESSION['user']; ?>&nbsp;<span class="caret"></span><ul class="dropdown-menu">
     <li>
                        <a href="admin_member.php">รายชื่อสมาชิก</a>
                    </li>
                    <li>
                        <a href="admin_product.php">รายชื่อสินค้า</a>
                    </li>
      <li>
          <a href="admin_payment.php">ยอดการชำระ</a>
                    </li>
                     <li>
                         <a href="admin_order.php">การสั่งซื้อสินค้าทั้งหมด</a>
                    </li>
    </ul></a>
            </li>   
                     <li>
                        <a href="report.php?d1=0&d2=0">ดูรายงาน</a>
                    </li>
                   <li><a href="logout.php?logout" id="nav-logout"> <span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
                </ul>
                
            </div>
          
  
<!--       <script src="http://tristanedwards.me/u/SweetAlert/lib/sweet-alert.js"></script>
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
   
     </script>-->
    
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
                      
  <div class="col-md-12">
						<div class="pull-right">
						<!-- form สำหรับค้นหาข้อมูล -->
                                                <form class="form-inline" method="POST" action="admin_payment.php">
							  <div class="form-group">
								<input type="text" class="form-control" name="search_orderdetail" placeholder="พิมพ์ลูกค้าที่ต้องการค้นหา">
							  </div>
							  <input type="submit" value="ค้นหา">
							</form>
						</div>
					</div>
                        
                        <div id="loader"></div>
        <body onload="myFunction()" style="margin:0;">
        
        <div style="display:none;" id="myDiv" class="animate-bottom">
                       
                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                    
                    <h2 class="brand-before">
                     
                                
                    
                    </h2>
                </div>
            </div>
        </div>
        
        
      
              
		<div class="container">
			<div class="row">
				<div class="col-md-12">

                                                                                                                            <?php
 $con = mysqli_connect('localhost', 'root', '', 's5714421001');
mysqli_query($con, "SET NAMES UTF8");
 
 $perpage = 5;
 if (isset($_GET['page'])) {
 $page = $_GET['page'];
 } else {
 $page = 1;
 }

 $start = ($page - 1) * $perpage;

 $sql = "SELECT *  FROM orders AS d1
             INNER JOIN payment  AS d2
             ON  (d1.order_id = d2.order_id) 
              INNER JOIN order_details  AS d3
             ON  (d1.order_id = d3.order_id)
            INNER JOIN products AS d4
             ON  (d4.product_id = d3.product_id) limit {$start} , {$perpage} ";
 $query = mysqli_query($con, $sql);

 ?>
                                    
					<h4>รายการสั่งซื้อทั้งหมด</h4> 
					
					
					<div class="col-md-12">
						<div class="pull-right">
						<!-- form สำหรับค้นหาข้อมูล -->
                                                
						</div>
					</div>
                                        <form  method = "GET"><table class="table table-hover">
							<thead>
								<tr>
<!--									<th width="10%">ลำดับ</th>-->
                                                                        <th width="10%">รหัสคำสั่งซื้อ</th>
                                                                        <th width="10%">ชื่อผู้ใช้งาน</th>
									<th width="15%">วัน/เวลา</th>
									<th width="15%">สถานะ</th>
                                                                        <th width="15%">สินค้าที่สั่ง</th>
                                                                         <th width="15%">จำนวนเงิน</th>
                                                                       
                                                                         <th width="15%">หลักฐานการโอนเงิน</th>
                                                                       
                 <?php
                           
		while($objResult = mysqli_fetch_assoc( $query))
   
		{
		
									
									 
										
								?>
								
										<tr>
											
                                                                                   
											
                                                                                         <td><?=$objResult['order_id'] ?> </td>
                                                                                        <td><?=$objResult['username']?></td>
                                                                                        <td><?=$objResult['order_date']?></td>
                                                                                     
                                                                                        
                                                                                        
					
                                        <td>
                                                                                            <?php
 
$status = 1; // ลองเปลี่ยนตัวเลขตรงนี้นะครับ เพื่อทดสอบ if else ที่เราได้เขียนไว้
 
if($objResult['status']==1){
	echo '                                               <p class="list-group-item-text">
                                  <span class="label label-danger">รอชำระเงิน</span>
                              </p>';
}
elseif ($objResult['status']==2) {
 echo '                                               <p class="list-group-item-text">
                                 <span class="label label-warning">รอตรวจสอบการชำระเงิน</span>
                              </p>';
}

elseif ($objResult['status']) {
  echo '                                               <p class="list-group-item-text">
                                 <span class="label label-success">หลักฐานถูกต้อง</span>
                              </p>';
}
else{
	 echo "<font color='orange'> ตรวจสอบการจัดส่งสินค้า </font>";
	 echo "<h1> รหัส EMS xxxx    </h1>";
}

?>
                                                                                            
                                                                                     
                                              

         </td>                          
<td> <a class="example-image-link" href="img/img_product/<?php echo $objResult['product_img_name']; ?>"data-lightbox="example-1" data-title="ชื่อไฟล์:<?php echo $objResult['product_img_name']; ?>"><img class="example-image" src="img/img_product/<?php echo $objResult['product_img_name']; ?>"alt="image-1" border="0" width="100" height="100" /></a></td>

<td><?=$objResult['pay_price']?> </td>

<td><a href="img/img_payment/<?=$objResult['pay_file']?>" data-lightbox="image-1" data-title="ชื่อไฟล์:<?=$objResult['pay_file']?>"><button type='button' class="btn btn-success"><span  aria-hidden='true'></span>หลักฐานการโอนเงิน</button></a></td>
     <td><button class="btn btn-info" data-toggle="modal" data-target="#edit" onclick="return show_edit_payment(<?php echo $objResult['id']?>);">อัปเดตสถานะ</button></td>
     <td><button class="btn btn-danger btn-xs" onclick="return delete_payment(<?php echo $objResult['order_id']?>);">ลบ</button></td>
 <?php
										
										
                                                                       					

									                     if($objResult >= 1){
//	echo("มีข้อมูลใน table");
}else{
	echo("ไม่มีพบข้อมูล");
}
		 }								
                                                                        
?>
								




            
  <?php
              
              
              ?>


											
										</tr>
									
								
								
							</tbody>
							
						</table>
                                             <?php
 $sql2 = "SELECT *  FROM orders AS d1
             INNER JOIN payment  AS d2
             ON  (d1.order_id = d2.order_id) 
              INNER JOIN order_details  AS d3
             ON  (d1.order_id = d3.order_id)
            INNER JOIN products AS d4
             ON  (d4.product_id = d3.product_id) ";
 $query2 = mysqli_query($con, $sql2);
 $total_record = mysqli_num_rows($query2);
 $total_page = ceil($total_record / $perpage);
 ?>
                                             <nav>
 <ul class="pagination">
 <li>
 <a href="admin_payment.php?page=1" aria-label="Previous">
 <span aria-hidden="true">&laquo;</span>
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){ ?>
 <li><a href="admin_payment.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
 <?php } ?>
 <li>
 <a href="admin_payment.php?page=<?php echo $total_page;?>" aria-label="Next">
 <span aria-hidden="true">&raquo;</span>
 </a>
 </li>
 </ul>
 </nav>
                                        </form>
						
				</div>
			</div>
		</div>
                <!-- Modal Patment -->
	

                
                
           
<!--โค้ดสถานะ-->

<!--โค้ดสถานะ-->

	
		
		<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">รายละเอียดการโอน</h4>
			  </div>
			  <div class="modal-body">
					<div id="edit_payment"></div>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="return edit_payment_form();">อัปเดทสถานะ</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
			  </div>
			</div>
		  </div>
		</div>
            </div>
            </div>
        </div>
  
    <!-- /.container -->

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
    <!-- สคริปของ รายละเอียดการชำระเงิน -->
    <script src="js/script_payment.js" type="text/javascript"></script>
    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
    
    <script src="js/loader.js"></script>
    <script>  
 $(document).ready(function(){  
      $('#upload').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>  

</body>
    <script src="js/lightbox.js" type="text/javascript"></script>
</html>

