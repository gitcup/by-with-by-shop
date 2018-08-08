<?php
include"./class/database.class.php";

//create object
$process = new Database();

	//Add_user
	if(isset($_POST['send_Username'])){
		//รับข้อมูลจาก FORM ส่งไปที่ Method add_user
		$process->add_user($_POST);
	}
	
	//show edit data form
	if(isset($_POST['show_user_id'])){
		
		$edit_user = $process->get_order($_POST['show_user_id']);

		echo'<form id="edit_user_form">
			  <div class="form-group">
				<label >ชื่อผูใช้</label>
				<input type="text" class="form-control" name="edit_Username" value="'.$edit_user['Username'].'">
			  </div>
			  <div class="form-group">
				<label >รหัสผ่าน</label>
				<input type="text" class="form-control" name="edit_Password" value="'.$edit_user['Password'].'">
			  </div>
                           <div class="form-group">
				<label >สถานะ</label>
				<input type="text" class="form-control" name="edit_Name" value="'.$edit_user['Name'].'">
			  </div>
                          <div class="form-group">
				<label >ชื่อจริง</label>
				<input type="text" class="form-control" name="edit_Status" value="'.$edit_user['Status'].'">
			  </div>
                          <div class="form-group">
				<label >อีเมล</label>
				<input type="text" class="form-control" name="edit_Email" value="'.$edit_user['Email'].'">
			  </div>
			  <input type="hidden" name="edit_user_id" value="'.$edit_user['UserID'].'" >
			</form>';
	}
	
	//edit user 
	if(isset($_POST['edit_user_id'])){
		
		$process->edit_user($_POST);
		
	}
	
	//delete user
	if(isset($_POST['delete_user_id'])){
		
		$process->delete_user($_POST['delete_user_id']);
	}
	

?>