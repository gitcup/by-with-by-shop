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
	
	//function เรื่ยกดูข้อมูล all product
	public function get_all_product(){
		
		$db = $this->connect();
		$get_product = $db->query("SELECT * FROM products");
		
		while($product = $get_product->fetch_assoc()){
			$result[] = $product;
		}
		
		if(!empty($result)){
			
			return $result;
		}
	}
        
        
	public function search_product($post = null){
		
		$db = $this->connect();
		$get_product = $db->query("SELECT * FROM products WHERE product_name LIKE '%".$post."%' ");
		
		while($product = $get_product->fetch_assoc()){
			$result[] = $product;
		}
		
		if(!empty($result)){
			
			return $result;
		}
		
	}
	
	public function get_product($product_id){
		
		$db = $this->connect();
		$get_product = $db->prepare("SELECT product_id,product_code,product_name,product_desc,product_img_name,product_price FROM products WHERE product_id = ?");
		$get_product->bind_param('i',$product_id);
		$get_product->execute();
		$get_product->bind_result($id,$product_code,$product_name,$product_desc,$product_img_name,$product_price);
		$get_product->fetch();
		
		$result = array(
			'product_id'=>$id,
			'product_code'=>$product_code,
			'product_name'=>$product_name,
                        'product_desc'=>$product_desc,
                        'product_img_name'=>$product_img_name,
                        'product_price'=>$product_price
                        
		);
		
		return $result;
	}
	

	
	//function edit product
	public function edit_product($data){
		
		$db = $this->connect();

		$add_product = $db->prepare("UPDATE products SET product_code = ? , product_name = ? , product_desc=? ,product_price=? WHERE product_id = ?");
		
		$add_product->bind_param("ssssi",$data['edit_product_code'],$data['edit_product_name'],$data['edit_product_desc'],$data['edit_product_price'],$data['edit_product_id']);
		
		if(!$add_product->execute()){
			
			echo $db->error;
			
		}else{
			
			echo "บันทึกข้อมูลเรียบร้อย";
		}
	}
	
	//function delete product
	public function delete_product($id){
		
		$db = $this->connect();
		
		$del_product = $db->prepare("DELETE FROM products WHERE product_id = ?");
		
		$del_product->bind_param("i",$id);
		
		if(!$del_product->execute()){
			
			echo $db->error;
			
		}else{
			
			echo "ลบข้อมูลเรียบร้อย";
		}
	}
	
	
	
	
}
?>