

//show data for edit
function show_edit_order_detail(id){
	$.ajax({
		type:"POST",
		url:"order_detail_process.php",
		data:{show_order_detail_id:id},
		success:function(data){
			$("#edit_order_detail").html(data);
		}
	});
	return false;
}

//edit data
function show_order_detail(){
	$.ajax({
		type:"POST",
		url:"order_detail_process.php",
		data:$("#edit_order_detail_form").serialize(),
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
function delete_order(id){
	if(confirm("คุณต้องการลบข้อมูลหรือไม่")){
		$.ajax({
			type:"POST",
			url:"order_detail_process.php",
			data:{delete_order_detail_id:id},
			success:function(data){
				alert(data);
				location.reload();
			}
		});
	}
	return false;
}