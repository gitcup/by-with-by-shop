<?php
header("Content-type:application/json; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);  
// ส่วนติดต่อกับฐานข้อมูล
mysql_connect("localhost","root","") or die("Cannot connect the Server");     
mysql_select_db("s5714421001") or die("Cannot select database");     
mysql_query("set character set utf8");   
?>
<?php
// ในที่นี้เราจะใช้เป็นเดือน จึงมีการสร้าง array เก็บค่าเดือน
$thai_month=array(   
"ม.ค.",     
"ก.พ.",     
"มี.ค.",     
"เม.ย.",     
"พ.ค.",     
"มิ.ย.",      
"ก.ค.",     
"ส.ค.",     
"ก.ย.",     
"ต.ค.",     
"พ.ย.",     
"ธ.ค."                      
);  
// สร้างฟังก์ชั่น หายอดจำนวนที่ขายได้รวม ในแต่ละเดือน ของสินค้าใดๆ
// โดยจะสิ่งชื่อสินค้า และปี เข้าไปเพื่อตรวจสอบ และสร้างค่าตัวแปร array 
// ชุดข้อมูล
function getData($val,$year){
    $arr_data=array();
    // คำสั่ง sql เปลี่ยนไปตามความเหมาะสม ขึ้นกับว่าเป็นข้อมูลประเภทไหน
    // และต้องการใช้ข้อมูลในลักษณะใด ในที่นี้ เป็นการหายอดรวม ของสินค้า
    // แต่ละรายการ ในแต่ละเดือน ของปี ที่ส่งค่าตัวแปรมา 
    $q="
    SELECT 
    SUM(pay_price) as total_quantity 
    FROM payment WHERE pay_id='".$val."' AND pay_date LIKE '".$year."%'
    GROUP BY DATE_FORMAT( pay_date,  '%Y-%m-01' ) 
    ";    
    $qr=mysql_query($q);
    while($rs=mysql_fetch_array($qr)){    
        $arr_data[]=$rs['total_quantity'];
    }
    return $arr_data;  // ส่งค่ากลับชุด array ข้อมูล
}
// สร้างชุด array ข้อมูลของสินค้า A ปี เป็นตัวแปร $_GET['year'] ที่เราส่งมาในที่นี้คือปี 2014
$col_A=getData('1',$_GET['year']); // สร้างชุด array ข้อมูลของสินค้า A
$col_B=getData('2',$_GET['year']); // สร้างชุด array ข้อมูลของสินค้า B

// กำหนดตัวแปร $i ไว้อ้างอิง key ของชุดข้อมูล array
$i=0;
$q="
SELECT 
pay_id
FROM payment 
GROUP BY DATE_FORMAT( pay_date,  '%Y-%m-01' ) 
";
// การ query จะใช้ group by เดียวกัน เพื่อให้ key ของข้อมูล array ตรงและสัมพันธ์กัน
$qr=mysql_query($q);
while($rs=mysql_fetch_array($qr)){
    $json_data[]=array(
        $thai_month[$i],  // สร้างข้อมูลแถวที่สองขึั้นไป คอลัมน์แรก อันนี้คือ เดือนย่อ
        intval($col_A[$i]),  // สร้างข้อมูลแถวที่สองขึั้นไป คอลัมน์ที่สอง ข้อมูลยอดรวมของ สินค้า A
        intval($col_B[$i]),  // สร้างข้อมูลแถวที่สองขึั้นไป คอลัมน์ที่สาม ข้อมูลยอดรวมของ สินค้า B

    );  
    $i++; // เพื่ม key ของตัวแปร arrray
}
// ใส่ชุดข้อมูลแถวแรกเข้าไปในตัวแปร array 
array_unshift($json_data,array("เดือน","สินค้า A","สินค้า B"));
$json= json_encode($json_data); // แปลงข้อมูล array เป็น ข้อความ json object นำไปใช้งาน
echo $json;
?>