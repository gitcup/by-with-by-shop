<?php
class Database {
 
       private $host = 'localhost'; //ชื่อ Host 
	   private $user = 'root'; //ชื่อผู้ใช้งาน ฐานข้อมูล
	   private $password = ''; // password สำหรับเข้าจัดการฐานข้อมูล
	   private $database = 's5714421001'; //ชื่อ ฐานข้อมูล

	//function เชื่อมต่อฐานข้อมูล
	protected function connect(){
		
		$mysqli = new mysqli($this->host,$this->user,$this->password,$this->database);
			
			$mysqli->set_charset("utf8");

			if ($mysqli->connect_error) {

			    die('Connect Error: ' . $mysqli->connect_error);
			}

		return $mysqli;
	}
	
	//function เรื่ยกดูข้อมูล all order
	public function get_all_order(){
		
		$db = $this->connect();
		$get_order = $db->query("SELECT * FROM orders");
		
		while($order = $get_order->fetch_assoc()){
			$result[] = $order;
		}
		
		if(!empty($result)){
			
			return $result;
		}
	}
        
        
	public function search_order($post = null){
		
		$db = $this->connect();
		$get_order = $db->query("SELECT * FROM orders WHERE username LIKE '%".$post."%' ");
		
		while($order = $get_order->fetch_assoc()){
			$result[] = $order;
		}
		
		if(!empty($result)){
			
			return $result;
		}
		
	}
	
	public function get_order($order_id){
		
		$db = $this->connect();
		$get_order = $db->prepare("SELECT order_id,order_date,order_fullname,order_address,order_province,order_amphur,order_district,order_zipcode,order_phone,username,status FROM orders WHERE order_id = ?");
		$get_order->bind_param('i',$order_id);
		$get_order->execute();
		$get_order->bind_result($id,$order_date,$order_fullname,$order_address,$order_province,$order_amphur,$order_district,$order_zipcode,$order_phone,$username,$status);
		$get_order->fetch();
		
		$result = array(
			'id'=>$id,
			'order_date'=>$order_date,
			'order_fullname'=>$order_fullname,
                        'order_address'=>$order_address,
                        'order_province'=>$order_province,
                        'order_amphur'=>$order_amphur,
                        'order_district'=>$order_district,
                    'order_zipcode'=>$order_zipcode,
                     'order_phone'=>$order_phone,
                    'username'=>$username,
                        'status'=>$status
		);
		
		return $result;
	}
	
	//function เพื่ม order
	public function add_order($data){
		 
            
		$db = $this->connect();
//		
//                $file = $_FILES['image']['name'];
//อันเก่าทำงานได้     $query = "INSERT INTO orders(order_img_name) VALUES ('$file')";  
                
              
//                $query = "INSERT INTO orders(order_img_name) VALUES ('$file')";
//      if(mysqli_query($connect, $query))  
//      {  
//           echo '<script>alert("เพิ่มรูปภาพลงฐานข้อมูลเรียบร้อย")</script>';  
//      }  $file = $_FILES['fileupload']['name'];

sleep(3);

//เพิ่มชื่อรูปลงฐานข้อมูล



		$add_order = $db->prepare("INSERT INTO orders (order_id,order_code,order_name,order_desc,order_img_name,order_price) VALUES(NULL,?,?,?,'eie',?)");
                
                $add_order->bind_param("ssss",$data['send_order_code'],$data['send_order_name'],$data['send_order_desc'],$data['send_order_price']);
//		$add_order = $db->prepare("INSERT INTO order (id,name,tel) VALUES(NULL,?,?) ");
//		
//		$add_order->bind_param("ss",$data['send_name'],$data['send_tel']);
         
		if(!$add_order->execute()){
			
			echo $db->error;
			
		}else{
                    
			echo "บันทึกข้อมูลเรียบร้อย";
                        
			
		}
	
        }
	
	//function edit order
	public function edit_order($data){
		
		$db = $this->connect();

		$add_order = $db->prepare("UPDATE orders SET order_code = ? , order_name = ? , order_desc=? ,order_price=? WHERE order_id = ?");
		
		$add_order->bind_param("ssssi",$data['edit_order_code'],$data['edit_order_name'],$data['edit_order_desc'],$data['edit_order_price'],$data['edit_order_id']);
		
		if(!$add_order->execute()){
			
			echo $db->error;
			
		}else{
			
			echo "บันทึกข้อมูลเรียบร้อย";
		}
	}
	
	//function delete order
	public function delete_order($id){
		
		$db = $this->connect();
		
		$del_order = $db->prepare("DELETE FROM orders WHERE id = ?");
		
		$del_order->bind_param("i",$id);
		
		if(!$del_order->execute()){
			
			echo $db->error;
			
		}else{
			
			echo "ลบข้อมูลเรียบร้อย";
		}
	}
	
	
	
	
}
?>