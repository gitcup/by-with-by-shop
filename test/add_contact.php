<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

      <title>By With By-ยินดีต้อนรับ</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

   
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    
  

</head>

<body>

   <div class="brand">By With By</div>
    <div class="address-bar">Chanthaburi | 22000 | Tumbon.chanthanimit</div>

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
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
                  <li>
                      <a href="index.php">หน้าแรก</a>
                    </li>
                    <li>
                        <a href="sell_list.php">สั่งซื้อสินค้า</a>
                    </li>
                    <li>
                        <a href=".php">การบ้าน</a>
                    </li>
                    <li>
                        <a href="contact.php">ติดต่อเรา</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<div class="box" align="center">
                <?php
//กำหนดตัวแปรเพื่อนำไปใช้งาน
$cfHost = "localhost";

$cfUser = "root";
$cfPassword = "csit";

$cfDatabase = "s5714421001";
 
mysql_connect($cfHost, $cfUser,$cfPassword) or die("ติดต่อฐานข้อมูลไม่ได้");
mysql_select_db($cfDatabase) or die("เลือกฐานข้อมูลไม่ได้");


$m_name = $_GET['m_name'];
$m_Email = $_GET['m_Email'];
$m_tel = $_GET['m_tel'];
$m_message = $_GET['m_message'];
$sql = "insert into member_info";
$sql .= " values (null,'$m_name','$m_Email','$m_tel','$m_message')";


mysql_query("SET NAMES UTF8");
$dbquery = mysql_db_query($cfDatabase, $sql);


mysql_close();
echo "<Font Size=4><B>เพิ่มข้อมูลลงฐานข้อมูลเรียบร้อยแล้ว</B>";
echo '<a href="index.php">กลับหน้าหลัก</a>';
?>
    
                        </div>
                     <!-- /.container -->
                     <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>By With By 2017</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
