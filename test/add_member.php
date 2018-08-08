<?php
//กำหนดตัวแปรเพื่อนำไปใช้งาน
$cfHost = "localhost";

$cfUser = "root";
$cfPassword = "csit";

$cfDatabase = "s5714421001";
 
mysql_connect($cfHost, $cfUser,$cfPassword) or die("ติดต่อฐานข้อมูลไม่ได้");
mysql_select_db($cfDatabase) or die("เลือกฐานข้อมูลไม่ได้");


$username = $_GET['username'];
$password = $_GET['password'];
$name = $_GET['name'];
$status = $_GET['status'];
$Email = $_GET['Email'];
$sql = "insert into member";
$sql .= " values (null,'$username','$password','$name','$status','$Email')";


mysql_query("SET NAMES UTF8");
$dbquery = mysql_db_query($cfDatabase, $sql);


mysql_close();
echo "<Font Size=4><B>เพิ่มข้อมูลลงฐานข้อมูลเรียบร้อยแล้ว</B>";
echo '<a href="index.php">กลับหน้าหลัก</a>';
?>