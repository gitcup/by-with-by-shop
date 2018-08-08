

//show data for edit
function show_edit_payment(id){
	$.ajax({
		type:"POST",
		url:"order_payment_process.php",
		data:{show_payment_id:id},
		success:function(data){
			$("#edit_payment").html(data);
		}
	});
	return false;
}

//edit data
function edit_payment_form(){
	$.ajax({
		type:"POST",
		url:"order_payment_process.php",
		data:$("#edit_payment_form").serialize(),
		success:function(data){
			
			//close modal
			$(".close").trigger("click");
			
			//show result
			alert(data);
			
			//reload page
			location.reload();
		}
	});
	return false;
}




//delete product
function delete_payment(id){
	if(confirm("คุณต้องการลบข้อมูลหรือไม่")){
		$.ajax({
			type:"POST",
			url:"order_payment_process.php",
			data:{delete_payment_id:id},
			success:function(data){
				alert(data);
				location.reload();
			}
		});
	}
	return false;
}
