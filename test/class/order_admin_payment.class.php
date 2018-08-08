
<?php
class Database {
 
       private $host = 'localhost'; //ชื่อ Host 
	   private $order_detail = 'root'; //ชื่อผู้ใช้งาน ฐานข้อมูล
	   private $password = ''; // password สำหรับเข้าจัดการฐานข้อมูล
	   private $database = 's5714421001'; //ชื่อ ฐานข้อมูล

	//function เชื่อมต่อฐานข้อมูล
	protected function connect(){
		
		$mysqli = new mysqli($this->host,$this->order_detail,$this->password,$this->database);
			
			$mysqli->set_charset("utf8");

			if ($mysqli->connect_error) {

			    die('Connect Error: ' . $mysqli->connect_error);
			}

		return $mysqli;
	}
	
	//function เรื่ยกดูข้อมูล all order_detail
	public function get_all_order_detail(){
		session_start();
		$db = $this->connect();
		$get_order_detail = $db->query("SELECT * FROM orders  ");
		
		while($order_detail = $get_order_detail->fetch_assoc()){
			$result[] = $order_detail;
		}
		
		if(!empty($result)){
			
			return $result;
		}
	}
        
        
	public function search_orderdetail($post = null){
		
		$db = $this->connect();
		$get_orderdetail = $db->query("SELECT * FROM orders WHERE username LIKE '%".$post."%' ");
		
		while($order_detail = $get_orderdetail->fetch_assoc()){
			$result[] = $order_detail;
		}
		
		if(!empty($result)){
			
			return $result;
		}
		
	}
	
	public function get_payment($order_detail_id){
		
		$db = $this->connect();
		$get_order_detail = $db->prepare("SELECT *  FROM orders AS d1
             INNER JOIN payment  AS d2
             ON  (d1.order_id = d2.order_id) 
              INNER JOIN order_details  AS d3
             ON  (d1.order_id = d3.order_id)
            where id=?");
		$get_order_detail->bind_param('i',$order_detail_id);
		$get_order_detail->execute();
		$get_order_detail->bind_result($order_id,$order_date,$order_fullname,$order_address,$order_province,$order_amphur,$order_district,$order_zipcode,$order_phone,$username,$status
                        ,$pay_id,$pay_date,$pay_bank,$pay_file,$pay_time,$pay_price,$order_id,
                        $id,$order_detail_quantity,$order_detail_price,$product_id,$order_id,$username);
		$get_order_detail->fetch();
		
		$result = array(
			 'order_id'=>$order_id,
                        'order_date'=>$order_date,	
                        'order_fullname	'=>$order_fullname,
                        'order_address'	=>$order_address,
                        'order_province'=>$order_province,	
                        'order_amphur'=>$order_amphur,
                        'order_district'=>$order_district,	
                        'order_zipcode'=>$order_zipcode,
                        'order_phone'=>$order_phone,
                        'username'=>$username,	
                        'status'=>$status,
                        'pay_id'=>$pay_id,
                        'pay_date'=>$pay_date,	
                        'pay_bank'=>$pay_bank,	
                        'pay_file'=>$pay_file,	
                        'pay_time'=>$pay_time,	
                        'pay_price'=>$pay_price,
                         'order_id'=>$order_id,
                        'id'=>$id,
			'order_detail_quantity'=>$order_detail_quantity,
			'order_detail_price'=>$order_detail_price,
                        'product_id'=>$product_id,
                        'order_id'=>$order_id,
                        'username'=>$username,	
                        
                        
                        
		);
		
		return $result;
	}
	
	//function เพื่ม order_detail
	public function add_order_detail($data){
		
		$db = $this->connect();
//		
		$add_order_detail = $db->prepare("INSERT INTO member (UserID,Username,Password,Name,Lname,address,number,Status,Email) VALUES(NULL,?,?,?,?,?,?,?,?)");
		$add_order_detail->bind_param("sssss",$data['send_Username'],$data['send_Password'],$data['send_Name'],$data['send_Lname'],$data['send_address'],$data['send_number'],$data['send_Status'],$data['send_Email']);
//		$add_order_detail = $db->prepare("INSERT INTO order_detail (id,name,tel) VALUES(NULL,?,?) ");
//		
//		$add_order_detail->bind_param("ss",$data['send_name'],$data['send_tel']);
		if(!$add_order_detail->execute()){
			
			echo $db->error;
			
		}else{
			
			echo "บันทึกข้อมูลเรียบร้อย";
		}
	}
	
	//function edit order_detail
	public function edit_payment($data){
		
		$db = $this->connect();
		
		$add_order_detail = $db->prepare("UPDATE orders SET status = ? WHERE order_id = ?");
		
		$add_order_detail->bind_param("si",$data['edit_status'],$data['edit_payment_id']);
		
		if(!$add_order_detail->execute()){
			
			echo $db->error;
			
		}else{
			
		echo "บันทึกข้อมูลเรียบร้อย";
		}
	}
	
	//function delete order_detail
	public function delete_payment($id){
		
		$db = $this->connect();
		
             
                
                $del_payment = $db->prepare("DELETE FROM payment WHERE order_id = ?");
		
		$del_payment->bind_param('i',$id);
		
		if(!$del_payment->execute()){
			
			echo $db->error;
			
		}else{
                    
			
			echo "ลบข้อมูลเรียบร้อย";
		}
	}
	
	
	
	
}
?>
