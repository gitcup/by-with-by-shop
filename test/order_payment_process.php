<?php
include"./class/order_admin_payment.class.php";

//create object
$process = new Database();

	//Add_order_detail
	
	
	//show edit data form
	if(isset($_POST['show_payment_id'])){
		
		$edit_payment = $process->get_payment($_POST['show_payment_id']);
			 

		{
		echo'<form id="edit_payment_form">
			  <div class="form-group">
				<label >ธนาคาร</label>
				'.$edit_payment['pay_bank'].'
			  </div>
			  <div class="form-group">
				<label >วันที่โอน</label>
				'.$edit_payment['pay_date'].'
			  </div><span>
                          <div class="form-group">
				<label >เวลาที่โอน</label>
				'.$edit_payment['pay_time'].'
			  </div>
                          
                          <div class="form-group">
				<label >จำนวนเงิน</label>
				'.$edit_payment['pay_price'].'
			  </div>
                          <label>สถานะ</label>
  <select class="form-control" name="edit_status" value="'.$edit_payment['status'].'">
    <option value=1>ยังไม่ได้ชำระเงิน</option>
    <option value=2>รอตรวจสอบ</option>
     <option value=3>กำลังจัดส่งสินค้า</option>
  </select>
                          
			  <input type="hidden" name="edit_payment_id" value="'.$edit_payment['order_id'].'" >
			</form>
                        
                            <table class="table table-hover">
                            <thead>
								<tr><th width="10%">รหัสสินค้า</th>
									 <th width="15%">จำนวน</th>
									<th width="20%">ราคา</th>
									<th width="30%">รวมทั้งสิ้น</th>
									
				
										<tr>
                                                                                         <td>'.$edit_payment['product_id'].'</td>
                                                                                        <td>'.$edit_payment['order_detail_quantity'].'</td>
                                                                                        <td>'.$edit_payment['order_detail_price'].'</td>
											<td>'.$edit_payment['order_detail_price']*$edit_payment['order_detail_quantity'].'</td>				
										</tr>	
							</tbody>
							
						</table>'
                        ;
                	
                }
	}
	
	
	if(isset($_POST['edit_payment_id'])){
		
		$process->edit_payment($_POST);
		
	}
	

	if(isset($_POST['delete_payment_id'])){
		
		$process->delete_payment($_POST['delete_payment_id']);
	}
	

?>