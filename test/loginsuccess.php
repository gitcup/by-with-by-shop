<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 

<?php
        include_once 'connect.php';
//set validation error flag as false
$error = false;
        if (isset($_POST['signup'])) {

    
     
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);
  
  $Lname = trim($_POST['Lname']);
  $Lname = strip_tags($Lname);
  $Lname = htmlspecialchars($Lname);
  
    $username = trim($_POST['username']);
  $username = strip_tags( $username);
  $username= htmlspecialchars( $username);
  
  $Email = trim($_POST['Email']);
  $Email = strip_tags($Email);
  $Email = htmlspecialchars($Email);
  
 
  $address = trim($_POST['address']);
  $address = strip_tags($address);
  $address = htmlspecialchars($address);
  
     $province = trim($_POST['province']);
  $province = strip_tags($province);
  $province = htmlspecialchars($province);
  
   $district = trim($_POST['district']);
  $district = strip_tags($district);
  $district = htmlspecialchars($district);
  
   $amphur = trim($_POST['amphur']);
  $amphur = strip_tags($amphur);
  $amphur = htmlspecialchars($amphur);
  
   $zipcode = trim($_POST['zipcode']);
  $zipcode = strip_tags($zipcode);
  $zipcode = htmlspecialchars($zipcode);
  
     $number = trim($_POST['number']);
  $number = strip_tags($number);
  $number = htmlspecialchars($number);
  
  $password = trim($_POST['password']);
  $password = strip_tags( $password);
  $password = htmlspecialchars( $password);
  
   $cpassword = trim($_POST['conpassword']);
  $cpassword = strip_tags( $cpassword);
  $cpassword = htmlspecialchars( $cpassword);
   
//$name = mysqli_real_escape_string($con, trim($_POST["name"]));    
    
    //name can contain only alpha characters and space
    //
//    if (!preg_match("/^[ก-๙]+$/",$name)) {
//        $error = true;
//        $name_error = "ชื่อจะต้องเป็นตัวอักษรไทย";
//    }
        
    $strSQL = "SELECT * FROM member WHERE Username = '".trim($_POST['username'])."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if($objResult)
	{
                        $error = true;
			  echo '<script type="text/javascript">';
  echo 'setTimeout(function () { swal({
  title: "ชื่อผู้ใช้งานซ้ำ",
  text: "กรุณาเปลี่ยนขื่อผู้ใช้งาน!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
});';
  echo '}, 1000);</script>';
	}
        
   if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {

  echo("$Email is not a valid email address");

    }
    if(strlen($password) < 6) {
        $error = true;
         $password_error = "รหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร";
        echo("$password_error ");
    }
//     if(strlen($number) < 10) {
//        $error = true;
//         echo '<script type="text/javascript">';
//  echo 'setTimeout(function () { swal({
//  title: "เบอร์โทรศัพท์ไม่ถูกต้อง",
//  text: "กรุณากรอกเบอร์มือถือ 10 หลัก!",
//  icon: "warning",
//  buttons: true,
//  dangerMode: true,
//});';
//   
//  echo '}, 1000);</script>';
//    }
    if($password != $cpassword) {
        $error = true;
        echo '<script type="text/javascript">';
  echo 'setTimeout(function () { swal({
  title: "รหัสผ่านไม่ตรงกัน",
  text: "กรุณาเปลี่ยนรหัสให้ตรงกัน!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
});';
   
  echo '}, 1000);</script>';
  echo"<head><meta http-equiv='Refresh'content = '5; URL = index.php'></head>"; 
    }
    if (!$error) {
        if($strSQL = "INSERT INTO member (Username,Password,Name,Lname,address,province,district,amphur,zipcode,number,Status,Email) VALUES('" . $username. "','" .$password . "', '" . $name . "','" . $Lname . "','" . $address . "','" . $province . "','" . $district . "','" . $amphur. "','" . $zipcode . "','" . $number . "','USER','" . ($Email) . "' )") {
            $objQuery = mysql_query($strSQL);
//            $successmsg = "Successfully Registered! <a href='register.php#login'>Click here to Login</a>";
            
            echo '<script type="text/javascript">';
echo 'setTimeout(function () { swal("สมัครเรียบร้อย!","กรุณาล็อคอินอีกครั้ง","success");';
  echo '}, 1000);</script>';
  
 echo"<head><meta http-equiv='Refresh'content = '5; URL = index.php'></head>"; 
        } else {
            $errormsg = "Error in registering...Please try again later!";
        }
      
    }
}

?>