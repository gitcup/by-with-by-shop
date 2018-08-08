<?php
	include"./class/database.class.php";
	
	//new database
	$db = new Database();
	
	if(isset($_POST['search_user'])){
		//get search user
		$get_user = $db->search_user($_POST['search_user']);
		
	}else{
		
		//call method getUser
		$get_user = $db->get_all_user();
	}

?>
<!DOCTYPE html>

 



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


<?php
            if (!isset($_SESSION['user']))
            {
                echo "<div class=\"alert alert-warning\"><a href='register.php#login'>คุณยังไม่ได้ล็อคอิน โปรดล็อคอิน</a> </div>";
                
                
                
                
                
            }
 

            ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

      <title>By With By-รายชื่อสมาชิก</title>

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
    
    <script src="js/script.js"></script>
    
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
                  <li><a href="logout.php?logout" id="nav-logout" > <span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
                </ul>
            </div>
          
    
     
   
    
  </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">

        <div class="active">
            <div class="col-sm-push-10">
                <div class="col-lg-12 text-center">
                    <div id="carousel-example-generic" class="carousel slide">
                        <!-- Indicators -->
                        <ol class="carousel-indicators hidden-xs">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>
  
                        
                        
                       
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
				<div class="box">
				
					<h4>รายชื่อสมาชิกทั้งหมด</h4> 
					<div class="col-md-6">
						<button class="btn btn-info" data-toggle="modal" data-target="#add_user">เพิ่มข้อมูล</button>
					</div>	
					
					<div class="col-md-6">
						<div class="pull-right">
						<!-- form สำหรับค้นหาข้อมูล -->
                                                <form class="form-inline" method="POST" action="admin_member.php">
							  <div class="form-group">
								<input type="text" class="form-control" name="search_user" placeholder="พิมพ์ชื่อที่ต้องการค้นหา">
							  </div>
							  <input type="submit" value="ค้นหา">
							</form>
						</div>
					</div>

						<table class="table table-hover">
							<thead>
								<tr>
									<th width="10%">ลำดับ</th>
									<th width="5%">รหัสผู้ใช้</th>
									 <th width="5%">ชื่อผู้ใช้</th>
                                                                        <th width="10%">รหัสผ่าน</th>
									<th width="15%">ชื่อ</th>
                                                                        <th width="15%">นามสกุล</th>
                                                                        <th width="20%">ที่อยู่</th>
                                                                        <th width="15%">เบอร์โทร</th>
									<th width="20%">อีเมล</th>
                                                                        
                                                                        <th width="15%">สถานะ</th>
								</tr>
							</thead>
							<tbody>
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

 $sql = "select * from member limit {$start} , {$perpage} ";
 $query = mysqli_query($con, $sql);
 ?>
								<?php

									$i = 1;
									if(!empty($get_user)){
										foreach($get_user as $user){
								?>
										<tr>
											<td><?php echo $i?></td>
											<td><?php echo $user['UserID']?></td>
											<td><?php echo $user['Username']?></td>
                                                                                        <td><?php echo $user['Password']?></td>
                                                                                        <td><?php echo $user['Name']?></td>
                                                                                           <td><?php echo $user['Lname']?></td>
                                                                                           <td><?php echo $user['address']?></td>
                                                                                           <td><?php echo $user['number']?></td>
                                                                                        <td><?php echo $user['Email']?></td>
                                                                                        <td><?php echo $user['Status']?></td>
											<td><button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edit_user" onclick="return show_edit_user(<?php echo $user['UserID']?>);">แก้ไข</button></td>
											<td><button class="btn btn-danger btn-xs" onclick="return delete_user(<?php echo $user['UserID']?>);">ลบ</button></td>
										</tr>
									
								<?php
										$i++;
										}
									}else{
										echo "<tr><td colspan='5'>ไม่พบข้อมูล</td></tr>";
									}
								?>
							</tbody>
							
						</table>
                                         <?php
 $sql2 = "select * from member ";
 $query2 = mysqli_query($con, $sql2);
 $total_record = mysqli_num_rows($query2);
 $total_page = ceil($total_record / $perpage);
 ?>
                                         <nav>
 <ul class="pagination">
 <li>
 <a href="admin_member.php?page=1" aria-label="Previous">
 <span aria-hidden="true">&laquo;</span>
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){ ?>
 <li><a href="admin_member.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
 <?php } ?>
 <li>
 <a href="admin_member.php?page=<?php echo $total_page;?>" aria-label="Next">
 <span aria-hidden="true">&raquo;</span>
 </a>
 </li>
 </ul>
 </nav>
				</div>
			</div>
		</div>


		<!-- Modal Add User -->
		<div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">เพิ่มข้อมูลสมาชิก</h4>
			  </div>
			  <div class="modal-body">
					<form id="add_user_form">
					  <div class="form-group">
						<label >ชื่อผู้ใช้</label>
						<input type="text" class="form-control" name="send_Username"  placeholder="ระบุ ชื่อผู้ใช้">
					  </div>
					  <div class="form-group">
						<label >รหัสผ่าน</label>
						<input type="text" class="form-control" name="send_Password"  placeholder="ระบุ รหัสผ่าน">
					  </div>
                                            <div class="form-group">
						<label >ชื่อจริง</label>
						<input type="text" class="form-control" name="send_Name"  placeholder="ระบุ ชื่อจริง">
					  </div>
                                            <div class="form-group">
						<label >สถานะ</label>
						<input type="text" class="form-control" name="send_Status"  placeholder="ระบุ สถานะ">
					  </div>
                                            <div class="form-group">
						<label >อีเมล</label>
						<input type="text" class="form-control" name="send_Email"  placeholder="ระบุ อีเมล">
					  </div>
					</form>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="return add_user_form();">Save changes</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  </div>
			</div>
		  </div>
		</div>
		
		<!-- Modal Edit User -->
		<div class="modal fade" id="edit_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">แก้ไขข้อมูลสมาชิก</h4>
			  </div>
			  <div class="modal-body">
					<div id="edit_form"></div>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="return edit_user_form();">Save changes</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
  



</body>

</html>
