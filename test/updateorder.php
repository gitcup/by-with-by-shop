<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
session_start();
$formid = isset($_SESSION['formid']) ? $_SESSION['formid'] : "";
if ($formid != $_POST['formid']) {
	echo "E00001!! SESSION ERROR RETRY AGAINT.";
} else {
	unset($_SESSION['formid']);
	if ($_POST) {
		require 'connect.php';
		$order_fullname = mysql_real_escape_string($_POST['order_fullname']);
		$order_address = mysql_real_escape_string($_POST['order_address']);
                $order_zipcode = mysql_real_escape_string($_POST['order_zipcode']);
		$order_phone = mysql_real_escape_string($_POST['order_phone']);
                   $order_province = mysql_real_escape_string($_POST['order_province']);
		$order_amphur = mysql_real_escape_string($_POST['order_amphur']);
                $order_district = mysql_real_escape_string($_POST['order_district']);
                
//                $province_id = $_POST['order_province'];
//    $amphur_id = $_POST['order_amphur'];
//    $district_id = $_POST['order_district'];
//
//    $sql_1 = "SELECT * FROM province WHERE PROVINCE_ID = '$province_id' ";
//    $result_1 = mysql_query($sql_1);
//    $row_1 = mysql_fetch_array($result_1);
//    $province_name = $row_1['PROVINCE_NAME'];
//
//    $sql_2 = "SELECT * FROM amphur WHERE AMPHUR_ID = '$amphur_id' ";
//    $result_2 = mysql_query($sql_2);
//    $row_2 = mysql_fetch_array($result_2);
//    $amphur_name = $row_2['AMPHUR_NAME'];
//
//    $sql_3 = "SELECT * FROM district WHERE DISTRICT_ID = '$district_id' ";
//    $result_3 = mysql_query($sql_3);
//    $row_3 = mysql_fetch_array($result_3);
//    $district_name = $row_3['DISTRICT_NAME'];
                
                $meSql = "INSERT INTO orders (order_date,username ,order_fullname, order_address, order_province, order_amphur, order_district, order_zipcode, order_phone,status) VALUES (NOW(),'{$_SESSION['user']}','{$order_fullname}','{$order_address}','{$order_province}','{$order_amphur}','{$order_district}','{$order_zipcode}','{$order_phone}','1') ";
		$meQeury = mysql_query($meSql);
		if ($meQeury) {
			$order_id = mysql_insert_id();
                        $user = $_SESSION['user'];
			for ($i = 0; $i < count($_POST['qty']); $i++) {
				$order_detail_quantity = mysql_real_escape_string($_POST['qty'][$i]);
				$order_detail_price = mysql_real_escape_string($_POST['product_price'][$i]);
				$product_id = mysql_real_escape_string($_POST['product_id'][$i]);
				$lineSql = "INSERT INTO order_details (order_detail_quantity, order_detail_price, product_id, order_id,username) ";
				$lineSql .= "VALUES (";
				$lineSql .= "'{$order_detail_quantity}',";
				$lineSql .= "'{$order_detail_price}',";
				$lineSql .= "'{$product_id}',";
				$lineSql .= "'{$order_id}',";
                                $lineSql .= "'{$user}'";
				$lineSql .= ") ";
				mysql_query($lineSql);
			}
			mysql_close();
			unset($_SESSION['cart']);
			unset($_SESSION['qty']);
                        echo '<script type="text/javascript">';
  echo 'setTimeout(function () { swal("สั่งซ้อสินค้าเรียบร้อย!","คลิ้ก OK เพื่อดำเนินการต่อ","success");';
  header( "Refresh:5; url=http://localhost/test/home.php", true, 303);
  echo '}, 1000);</script>';
			
		}else{
			mysql_close();
			header('location:home.php?a=orderfail');
		}
	}
}
?>