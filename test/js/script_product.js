//add new data
function add_product_form(){
	$.ajax({
		type:"POST",
		url:"product_process.php",
		data:$("#add_product_form").serialize(),
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
function show_edit_product(id){
	$.ajax({
		type:"POST",
		url:"product_process.php",
		data:{show_product_id:id},
		success:function(data){
			$("#edit_form").html(data);
		}
	});
	return false;
}

//edit data
function edit_product_form(){
	$.ajax({
		type:"POST",
		url:"product_process.php",
		data:$("#edit_product_form").serialize(),
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
function delete_product(id){
	if(confirm("คุณต้องการลบข้อมูลหรือไม่")){
		$.ajax({
			type:"POST",
			url:"product_process.php",
			data:{delete_product_id:id},
			success:function(data){
				alert(data);
				location.reload();
			}
		});
	}
	return false;
}