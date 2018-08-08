<?php //
	mysql_connect("localhost","root","csit");
	mysql_select_db("s5714421001");
	
        if(trim($_POST["txtFirstname"]) == "")
	{
		echo "โปรดใส่ชื่อของคุณ!";
		exit();	
	}
        if(trim($_POST["txtLastname"]) == "")
	{
		echo "โปรดใส่นามสกุล!";
		exit();	
	}
        if(trim($_POST["txtEmail"]) == "")
	{
		echo "โปรดใส่อีเมลของคุณ!";
		exit();	
	}
	if(trim($_POST["txtUsername"]) == "")
	{
		echo "โปรดใส่ Username!";
		exit();	
	}
	
	if(trim($_POST["txtPassword"]) == "")
	{
		echo "โปรดใส่รหัสผ่าน!";
		exit();	
	}	
		
	if($_POST["txtPassword"] != $_POST["txtConPassword"])
	{
		echo "รหัสผ่านไม่ตรงกัน!";
		exit();
	}
	
	
	
	$strSQL = "SELECT * FROM member WHERE Username = '".trim($_POST['txtFirstname'])."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if($objResult)
	{
			echo "Username already exists!";
	}
	else
	{	
		
		$strSQL = "INSERT INTO member (Name,Lname,Email,Username,Password,Status) VALUES ('".$_POST["txtFirstname"]."', 
//		'".$_POST["txtLastname"]."','".$_POST["txtEmail"]."','".$_POST["txtUsername"]."','".$_POST["txtPassword"]."','0')";
		$objQuery = mysql_query($strSQL);
		
		echo "Register Completed!<br>";		
	
		echo "<br> Go to <a href='login.php'>Login page</a>";
		
	}

	mysql_close();
?>
