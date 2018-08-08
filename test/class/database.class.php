
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
	
	//function เรื่ยกดูข้อมูล all user
	public function get_all_user(){
		
		$db = $this->connect();
		$get_user = $db->query("SELECT * FROM member");
		
		while($user = $get_user->fetch_assoc()){
			$result[] = $user;
		}
		
		if(!empty($result)){
			
			return $result;
		}
	}
        
        
	public function search_user($post = null){
		
		$db = $this->connect();
		$get_user = $db->query("SELECT * FROM member WHERE name LIKE '%".$post."%' ");
		
		while($user = $get_user->fetch_assoc()){
			$result[] = $user;
		}
		
		if(!empty($result)){
			
			return $result;
		}
		
	}
	
	public function get_user($user_id){
		
		$db = $this->connect();
		$get_user = $db->prepare("SELECT UserID,Username,Password,Name,Lname,address,number,Status,Email FROM member WHERE UserID = ?");
		$get_user->bind_param('i',$user_id);
		$get_user->execute();
		$get_user->bind_result($UserID,$Username,$Password,$Name,$Lname,$address,$number,$Status,$Email);
		$get_user->fetch();
		
		$result = array(
			'UserID'=>$UserID,
			'Username'=>$Username,
			'Password'=>$Password,
                        'Name'=>$Name,
                        'Lname'=>$Lname,
                        'address'=>$address,
                        'number'=>$number,
                        'Email'=>$Email,
                        'Status'=>$Status
                        
                        
		);
		
		return $result;
	}
	
	//function เพื่ม user
	public function add_user($data){
		
		$db = $this->connect();
//		
		$add_user = $db->prepare("INSERT INTO member (UserID,Username,Password,Name,Lname,address,number,Status,Email) VALUES(NULL,?,?,?,?,?,?,?,?)");
		$add_user->bind_param("sssss",$data['send_Username'],$data['send_Password'],$data['send_Name'],$data['send_Lname'],$data['send_address'],$data['send_number'],$data['send_Status'],$data['send_Email']);
//		$add_user = $db->prepare("INSERT INTO user (id,name,tel) VALUES(NULL,?,?) ");
//		
//		$add_user->bind_param("ss",$data['send_name'],$data['send_tel']);
		if(!$add_user->execute()){
			
			echo $db->error;
			
		}else{
			
			echo "บันทึกข้อมูลเรียบร้อย";
		}
	}
	
	//function edit user
	public function edit_user($data){
		
		$db = $this->connect();
		
		$add_user = $db->prepare("UPDATE member SET Username = ? , Password = ? , Name=? ,Lname=?,address=?,number=?,Status=?,Email=? WHERE UserID = ?");
		
		$add_user->bind_param("ssssssssi",$data['edit_Username'],$data['edit_Password'],$data['edit_Name'],$data['edit_Lname'],$data['edit_address'],$data['edit_number'],$data['edit_Status'],$data['edit_Email'],$data['edit_user_id']);
		
		if(!$add_user->execute()){
			
			echo $db->error;
			
		}else{
			
		echo "บันทึกข้อมูลเรียบร้อย";
		}
	}
	
	//function delete user
	public function delete_user($id){
		
		$db = $this->connect();
		
		$del_user = $db->prepare("DELETE FROM member WHERE UserID = ?");
		
		$del_user->bind_param("i",$id);
		
		if(!$del_user->execute()){
			
			echo $db->error;
			
		}else{
			
			echo "ลบข้อมูลเรียบร้อย";
		}
	}
	
	
	
	
}
?>
