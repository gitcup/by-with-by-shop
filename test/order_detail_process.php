<?php
include"./class/order_detail.class.php";

//create object
$process = new Database();

	//Add_order_detail
	
	
	//show edit data form
	if(isset($_POST['show_order_detail_id'])){
		
		$edit_order_detail = $process->get_order_detail($_POST['show_order_detail_id']);
			 

		{
		echo'<form id="edit_order_detail_form"><table class="table table-hover">
                     <div class="form-group">
				<label >ชื่อ</label>
				'.$edit_order_detail['order_fullname'].'
			  </div>
                           <div class="form-group">
				<label >ทีอยู่</label>
				'.$edit_order_detail['order_address'].'
			  </div>
                          <div class="form-group">
				<label >เบอร์โทร</label>
				'.$edit_order_detail['order_phone'].'
			  </div>
		<thead>
								<tr>
									<th width="15%">ลำดับการสั่งซื้อ</th>
                                                                        <th width="10%">รหัสสินค้า</th>
									<th width="15%">จำนวน</th>
									<th width="20%">ราคา</th>
									<th width="30%">รวมทั้งสิ้น</th>
								
				
										<tr>
											
                                                                                 
											<td>'.$edit_order_detail['order_id'].'</td>
                                                                                        <td>'.$edit_order_detail['product_id'].'</td>
                                                                                      <td>'.$edit_order_detail['order_detail_quantity'].'</td>
                                                                                         <td>'.$edit_order_detail['order_detail_price'].'</td>
                                                                                     
											 <td>'.$edit_order_detail['order_detail_price']*$edit_order_detail['order_detail_quantity'].'</td>
                                                                                             

            

 
                                                                            <?php
	}
  ?>  

											
										</tr>
									
								
								
							</tbody>
							
						</table>	 

';
                }
	}
	
	//edit order_detail 
	if(isset($_POST['edit_order_detail_id'])){
		
		$process->edit_order_detail($_POST);
		
	}
	
	//delete order_detail
	if(isset($_POST['delete_order_detail_id'])){
		
		$process->delete_order($_POST['delete_order_detail_id']);
	}
	

?>