<meta charset="UTF-8" />
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php 
require_once('connect.php');
    //Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
    date_default_timezone_set('Asia/Bangkok');
	//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
	$date1 = date("Ymd_His");
	//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
	$numrand = (mt_rand());
	
	//รับชื่อไฟล์จากฟอร์ม 
	$p_code = $_POST['p_code'];
        $p_name = $_POST['p_name'];
	$p_detail = $_POST['p_detail'];
        $p_img = (isset($_POST['p_img']) ? $_POST['p_img'] : '');
	$p_price = $_POST['p_price'];
	
		
	$upload=$_FILES['p_img'];
	if($upload <> '') { 

	//โฟลเดอร์ที่เก็บไฟล์
	$path="img/img_product/";
	//ตัวขื่อกับนามสกุลภาพออกจากกัน
	$type = strrchr($_FILES['p_img']['name'],".");
	//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
	$newname =$numrand.$date1.$type;

	$path_copy=$path.$newname;
	$path_link="img/img_product/".$newname;
	//คัดลอกไฟล์ไปยังโฟลเดอร์
	move_uploaded_file($_FILES['p_img']['tmp_name'],$path_copy);  
		
	
	}


			 $sql = "INSERT INTO products 
					(product_code,
                                        product_name, 
					product_desc, 
					product_img_name, 
					product_price) 
					VALUES
					('$p_code',
                                        '$p_name',
					'$p_detail',
					'$newname',
					'$p_price')";
                         
		
		$result = mysql_db_query($cfDatabase, $sql) or die ("Error in query: $sql " . mysql_error());

	mysql_close();



	if($result){
   echo '<script type="text/javascript">';
  echo 'setTimeout(function () { swal("เพิ่มข้อมูลสินค้าเรียบร้อย!","คลิ้ก OK เพื่อดำเนินการต่อ","success");';
  header( "Refresh:5; url=http://localhost/test/admin_product.php", true, 303);
  echo '}, 1000);</script>';
  
  
			
	  }
	  else{
		    echo "<script type='text/javascript'>";
				echo "window.location='admin_product.php';";
			echo "</script>";
	  }
	
	
 ?>