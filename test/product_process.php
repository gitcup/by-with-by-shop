<?php
include"./class/product.class.php";



if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"img/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
   
   
//create object
$process2 = new Database();

	//Add_product
	if(isset($_POST['send_product_code'])){
		//รับข้อมูลจาก FORM ส่งไปที่ Method add_product
		$process2->add_product($_POST);
	}
	
	//show edit data form
	if(isset($_POST['show_product_id'])){
		
		$edit_product = $process2->get_product($_POST['show_product_id']);
$i = 1;
									
		echo'<form id="edit_product_form">
			  <div class="form-group">
				<label >รหัสสินค้า</label>
				<input type="text" class="form-control" name="edit_product_code" value="'.$edit_product['product_code'].'">
			  </div>
			  <div class="form-group">
				<label >ชื่อสินค้า</label>
				<input type="text" class="form-control" name="edit_product_name" value="'.$edit_product['product_name'].'">
			  </div>
                           <div class="form-group">
				<label >คำอธิบาย</label>
				<input type="text" class="form-control" name="edit_product_desc" value="'.$edit_product['product_desc'].'">
			  </div>

                          <div class="form-group">
				<label >ราคา</label>
				<input type="text" class="form-control" name="edit_product_price" value="'.$edit_product['product_price'].'">
			  </div>
                          
                          <div class="form-group">
				<label >รูปภาพ</label>
				<input type="file" name="profile" class="form-control" required="" accept="*/image">
             
			  </div>

			  <input type="hidden" name="edit_product_id" value="'.$edit_product['product_id'].'" >
			</form>';
	
                                                                        }
        
	
	//edit product 
	if(isset($_POST['edit_product_id'])){
		
		$process2->edit_product($_POST);
		
	}
	
	//delete product
	if(isset($_POST['delete_product_id'])){
		
		$process2->delete_product($_POST['delete_product_id']);
	}
	

?>