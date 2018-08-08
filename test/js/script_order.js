//add new data
function add_order_form(){
	$.ajax({
		type:"POST",
		url:"order_process.php",
		data:$("#add_order_form").serialize(),
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

//show data for edit
function show_edit_order(id){
	$.ajax({
		type:"POST",
		url:"order_process.php",
		data:{show_order_id:id},
		success:function(data){
			$("#edit_form").html(data);
		}
	});
	return false;
}

//edit data
function edit_order_form(){
	$.ajax({
		type:"POST",
		url:"order_process.php",
		data:$("#edit_order_form").serialize(),
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

//delete order
function delete_order(id){
	if(confirm("คุณต้องการลบข้อมูลหรือไม่")){
		$.ajax({
			type:"POST",
			url:"order_process.php",
			data:{delete_order_id:id},
			success:function(data){
				alert(data);
				location.reload();
			}
		});
	}
	return false;
}