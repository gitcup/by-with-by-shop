<meta charset="UTF-8" />
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php 
require('../connect.php');
    //Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
    date_default_timezone_set('Asia/Bangkok');
	//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
//	$date1 = date("Ymd_His");
	//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
	$numrand = (mt_rand());
	
	//รับชื่อไฟล์จากฟอร์ม 
	 $m_order = $_POST['order_id'];
$m_bank = $_POST['bank'];
$p_img = (isset($_POST['p_img']) ? $_POST['p_img'] : '');
$p_price = $_POST['money'];
$p_day = $_POST['txtdate'];
$p_day = date("d/m/Y",strtotime($p_day));
//$p_date = $_POST['date'];
$p_time = $_POST['txttime'];
	
	
	
	
		
	$upload=$_FILES['p_img'];
	if($upload <> '') { 

	//โฟลเดอร์ที่เก็บไฟล์
	$path="../img/img_payment/";
	//ตัวขื่อกับนามสกุลภาพออกจากกัน
	$type = strrchr($_FILES['p_img']['name'],".");
	//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
	$newname =$numrand.$type;

	$path_copy=$path.$newname;
	$path_link="../img/img_payment/".$newname;
	//คัดลอกไฟล์ไปยังโฟลเดอร์
	move_uploaded_file($_FILES['p_img']['tmp_name'],$path_copy);  
		
	
	}

 $sql = "INSERT INTO payment 
					(pay_date,
                                        pay_bank, 
					pay_file, 
					pay_time, 
					pay_price,
                                        order_id) 
					VALUES
					('$p_day',
                                        '$m_bank',
					'$newname',
                                        '$p_time',
					'$p_price',
                                        '$m_order')";
                         
		
		$result = mysql_db_query($cfDatabase, $sql) or die ("Error in query: $sql " . mysql_error());
                
                 $sql2 = "UPDATE orders SET status = 2 WHERE order_id = $m_order;";
                
$result2 = mysql_db_query($cfDatabase, $sql2) or die ("Error in query: $sql2 " . mysql_error());
	mysql_close();


if($result){
   echo '<script type="text/javascript">';
  echo 'setTimeout(function () { swal("เพิ่มข้อมูลชำระเงิน!","ขอบคุณที่สั่งสินค้าของเรา","success");';
  header( "Refresh:5; url=http://localhost/test/payment.php", true, 303);
  echo '}, 1000);</script>';
  
  
			
	  }
	  else{
		    echo "<script type='text/javascript'>";
				echo "window.location='payment.php';";
			echo "</script>";
	  }
	
	
 ?>