<?php

	$HOST_NAME = "localhost";
	$DB_NAME = "s5714421001";
	$CHAR_SET = "charset=utf8"; 
	$USERNAME = "root";     
	$PASSWORD = "";  
	try {
	
		$db = new PDO('mysql:host='.$HOST_NAME.';dbname='.$DB_NAME.';'.$CHAR_SET,$USERNAME,$PASSWORD);				
		
	} catch (PDOException $e) {
	
		echo "ไม่สามารถเชื่อมต่อฐานข้อมูลได้ : ".$e->getMessage();
	
	}
 
?>