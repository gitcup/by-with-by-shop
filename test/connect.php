
<?php
/*
 * set var
 */
$cfHost = "localhost";
$cfUser = "root";
$cfPassword = "";
$cfDatabase = "s5714421001";


 
/*
 * connection mysql
 */
$conn = mysql_connect($cfHost, $cfUser, $cfPassword,$cfDatabase) or die("Error conncetion mysql...");
$meDatabase = mysql_select_db($cfDatabase);
mysql_query("SET NAMES UTF8");

//try {
//		$conn= new PDO("mysql:host={$cfHost};dbname={$cfDatabase}",$cfUser
//,$cfPassword);
//		$$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//
//	}catch(PDOException $e){
//		echo $e->getMessage();
//	}

?>