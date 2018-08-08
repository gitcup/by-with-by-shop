<?php
include"./class/product.class.php";

//new database
$db = new Database();

if (isset($_POST['search_product'])) {
    //get search product
    $get_product = $db->search_product($_POST['search_product']);
} else {

    //call method getUser
    $get_product = $db->get_all_product();
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
if (isset($_SESSION['qty'])) {
    $meQty = 0;
    foreach ($_SESSION['qty'] as $meItem) {
        $meQty = $meQty + $meItem;
    }
} else {
    $meQty = 0;
}
?>

<!--    อัพโหลดรูปภาพ-->


<?php
if (!isset($_SESSION['user'])) {
    echo "<div class=\"alert alert-warning\"><a href='register.php#login'>คุณยังไม่ได้ล็อคอิน โปรดล็อคอิน</a> </div>";
}

//            if ($meCount == 0)
//            {
//                echo "<div class=\"alert alert-warning\">ไม่มีสินค้าอยู่ในตะกร้า</div>";
//            }
?>
<!DOCTYPE html>
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>By With By-ยินดีต้อนรับ</title>

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


<!--       <script src="http://tristanedwards.me/u/SweetAlert/lib/sweet-alert.js"></script>
<link href="http://tristanedwards.me/u/SweetAlert/lib/sweet-alert.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script>
$("#nav-logout").click(function(e) {
e.preventDefault()
swal({
            title : "",
            text : "คุณต้องการออกจากระบบหรือไม่?",
    type : "warning",
    showCancelButton: true,
    confirmButtonText: "Yes",
    
},
function(isConfirm){
if (isConfirm) {
  //window.location="logut page url"; // if you need redirect page 
window.location = "logout.php?logout";
} else {
//	    alert("ยกเลิก");
}
})
});

 </script>-->


        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<div class="container">
    <script src="js/script_product.js"></script>
    <div class="row">
        <div class="box">
            <div class="col-lg-12 text-center">
                <div id="carousel-example-generic" class="carousel slide">
                    <!-- Indicators -->



                    <div id="loader"></div>
                    <body onload="myFunction()" style="margin:0;">

                        <div style="display:none;" id="myDiv" class="animate-bottom">

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

            <link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
            <link rel="stylesheet" type="text/css" href="tcal.css" />
            <script type="text/javascript" src="tcal.js"></script>
            <script language="javascript">
                        function Clickheretoprint()
                        {
                            var disp_setting = "toolbar=yes,location=no,directories=yes,menubar=yes,";
                            disp_setting += "scrollbars=yes,width=700, height=400, left=100, top=25";
                            var content_vlue = document.getElementById("content").innerHTML;

                            var docprint = window.open("", "", disp_setting);
                            docprint.document.open();
                            docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');
                            docprint.document.write(content_vlue);
                            docprint.document.close();
                            docprint.focus();
                        }
            </script>

            <?php
            date_default_timezone_set("Asia/Bangkok");
            ?>

            <script language="javascript" type="text/javascript">
                /* Visit http://www.yaldex.com/ for full source code
                 and get more free JavaScript, CSS and DHTML scripts! */
    <!-- Begin
    var timerID = null;
    var timerRunning = false;
    function stopclock (){
                        if (timerRunning)
                        clearTimeout(timerID);
                        timerRunning = false;
    }
    function showtime () {
                        var now = new Date();
                        var hours = now.getHours();
                        var minutes = now.getMinutes();
                        var seconds = now.getSeconds()
                        var timeValue = "" + ((hours > 12) ? hours - 12 : hours)
                        if (timeValue == "0")
                        timeValue = 12;
                        timeValue += ((minutes < 10) ? ":0" : ":") + minutes
                        timeValue += ((seconds < 10) ? ":0" : ":") + seconds
                        timeValue += (hours >= 12) ? " P.M." : " A.M."
                        document.clock.face.value = timeValue;
                        timerID = setTimeout("showtime()", 1000);
                        timerRunning = true;
        }
        function startclock() {
                        stopclock();
                        showtime();
           }
window.onload=startclock;
    // End -->
            </SCRIPT>
            </head>
            <?php

            function createRandomPassword() {
                $chars = "003232303232023232023456789";
                srand((double) microtime() * 1000000);
                $i = 0;
                $pass = '';
                while ($i <= 7) {

                    $num = rand() % 33;

                    $tmp = substr($chars, $num, 1);

                    $pass = $pass . $tmp;

                    $i++;
                }
                return $pass;
            }

            $finalcode = 'ID-' . createRandomPassword();
            ?>
            <body>

                <div class="container-fluid">
                    <div class="row-fluid">
                        
                        <div class="span10">
                            <font color="blue"><h2><i class="icon-table"> รายงานการขาย</i></h2></font>

                            <div style="margin-top: -19px; margin-bottom: 21px;">
                                <br><br><a  href="index.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> ย้อนกลับ</button></a>
                                <button  style="float:right;" class="btn btn-success "><a href="javascript:Clickheretoprint()"> พิมพ์</button></a>

                            </div>
                            <form action="report.php?d1=0&d2=0" method="get">
                                <center><strong>จาก : <input type="text" style="width: 223px; padding:14px;" name="d1" class="tcal" value="" /> ถึง: <input type="text" style="width: 223px; padding:14px;" name="d2" class="tcal" value="" />
                                        <button class="btn btn-info" style="width: 123px; height:35px; margin-top:-8px;margin-left:8px;" type="submit"><i class="icon icon-search icon-large"></i> ค้นหา</button>
                                    </strong></center>
                            </form>
                            <center><div class="content" id="content" style="width:80%; height:190px; text-align:center;">
                                    <div style="font-weight:bold; text-align:center;font-size:20px;margin-bottom: 15px;">
                                        รายงานจาก&nbsp;<?php echo $_GET['d1'] ?>&nbsp;ถึง&nbsp;<?php echo $_GET['d2'] ?>
                                    </div>
                                    <center><table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align:left;">
                                            <thead>
                                                <tr>
                                                    <th width="40%"> วันที่ </th>
                                                    <th width="40%"> รหัสคำสั่งซื้อ </th>
                                                    <th width="40%">ราคา</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                include('connect2.php');
                                                $d1 = $_GET['d1'];
                                                $d2 = $_GET['d2'];
                                                $result = $db->prepare("SELECT * FROM payment WHERE pay_date BETWEEN :a AND :b ORDER by pay_id DESC ");
                                                $result->bindParam(':a', $d1);
                                                $result->bindParam(':b', $d2);
                                                $result->execute();


                                                for ($i = 0; $row = $result->fetch(); $i++) {
                                                    ?>
                                                    <tr class="record">
                                                        <td><?php echo $row['pay_date']; ?></td>
                                                        <td><?php echo $row['order_id']; ?></td>
                                                        <td><?php
                                                            $dsdsd = $row['pay_price'];
                                                            echo formatMoney($dsdsd, true);
                                                            ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>

                                            </tbody>
                                            <thead>
                                                <tr>
                                                    <th colspan="2" style="border-top:1px solid #999999"> รวม: </th>
                                                    <th colspan="1" style="border-top:1px solid #999999" ><strong style="font-size: 22px;"> 
                                                            <?php

                                                            function formatMoney($number, $fractional = false) {
                                                                if ($fractional) {
                                                                    $number = sprintf('%.2f', $number);
                                                                }
                                                                while (true) {
                                                                    $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
                                                                    if ($replaced != $number) {
                                                                        $number = $replaced;
                                                                    } else {
                                                                        break;
                                                                    }
                                                                }
                                                                return $number;
                                                            }

                                                            $d1 = $_GET['d1'];
                                                            $d2 = $_GET['d2'];
                                                            $results = $db->prepare("SELECT sum(pay_price) FROM payment WHERE pay_date BETWEEN :a AND :b");
                                                            $results->bindParam(':a', $d1);
                                                            $results->bindParam(':b', $d2);
                                                            $results->execute();
                                                            for ($i = 0; $rows = $results->fetch(); $i++) {
                                                                $dsdsd = $rows['sum(pay_price)'];
                                                                echo formatMoney($dsdsd, true);
                                                            }
                                                            ?>
                                                        </strong></th>
                                                </tr>
                                            </thead>
                                        </table></center></center>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
   

</body>
        
        <script src="js/jquery.js"></script>
    <script type="text/javascript">
            $(function() {


                $(".delbutton").click(function () {

//Save the link in a variable called element
                var element = $(this);
//Find the id of the link that was clicked
                        var del_id = element.attr("id");
//Built a url to send
                        var info = 'id=' + del_id;
                        if (confirm("แน่ใจหรือว่าต้องการลบการอัปเดตนี้? ไม่มียกเลิก!"))
                {

                $.ajax({
                type: "GET",
                        url: "deletesales.php",
                        data: info,
                        success: functio            n () {

                      }
            });
            $(this).parents(".record").animate({
                                backgroundColor: "#fbc7c7" }, "fast")
                .animate({ opacity: "hide" }, "slow");

       }

                 return false;

                 });

            });
                       </sc           ript>
                  <!--            Load the AJAX API
                <script type="text/javascript" src="http                s://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

                                        // Load the Visualization API and the corechart package.
                        google.charts.load('current', {'packages':['corechart']});

                            // Set a callback to run when the Google Visualization API is loaded.
                            google.charts.setOnLoadCallback(drawChart);

                                // Callback that creates and populates a data table,
                                // instantiates the pie chart, passes in the data and
                                    // draws it.
                                    function drawChart() {

                                // Create the data table.
                                var data = new google.visualization.DataTable();
                                data.addColumn('string', 'Topping');
                                data.addColumn('number', 'Slices');
                                data.addRows([
                                ['แชมพูคาร์บอน', 3],
                                ['DP AYURVEDA', 1],
                                ['Skin Treat', 1],
                                ]);
                                // Set chart options
                                var options = {'title':'สินค้าที่ลูกค้าสั่ง',
                                        'width':800,
                                        'height':500};

// Instantiate and draw our chart, passing in some options.
var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
chart.draw(data, options);
}
</script>-->


            <!--		<div id="chart_div"></div>
                            <div style="margin:auto;wid        th:80%;">
            <div id="chart_div" sty                        le="margin:auto;width: 850px; height: 400px;"></div>  
                  </div>
             
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.mi        n.js"></script>   
         <script type="        text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart);
function drawChart() {

// ตั้งค่าต่างๆ ของกราฟ
var options = { 
title: "หัวข้อกราฟแนวตั้ง",
hAxis: {title: 'ข้อความแนวนอน', titleTextStyle: {color: 'red'}},
vAxis: {title: 'ข้อความแนวตั้ง', titleTextStyle: {color: 'blue'}},
width: 850,
height: 400,
bar: {groupWidth: "70%"},
legend: { position: 'right', maxLines: 3 },
tooltip: { trigger: 'select' }
};    

// ดึงข้อมูลจากฐานข้อมูลสร้างตัวแปร array ข้อมูลสำหรับใช้งาน
$.getJSON( "gen_data_chart.php",{ 
year:'2011' // ส่งค่าตัวแปร ไปถ้ามี ในที่นี้ ส่งปีไป เพราะจะดูข้อมูลรายเดือนของปีที่ก่ำหนด
},function( data ) { 
dataArray=data; // รับค่าข้อมูล เก็บไว้ในตัวแปร array

// แปลงข้อมูลจาก array สำหรับใช้ในการสร้าง กราฟ
var data = google.visualization.arrayToDataTable(dataArray);

// สร้างกราฟแนวตั้ง แสดงใน div id = chart_div
var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
chart.draw(data, options);  // สร้างกราฟ

});

}
</script>   -->

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

            </scrip            

            <script src="js/loader.js"></script>

            </body>

            </html>

