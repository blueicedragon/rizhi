$(document).ready(function(){

	//反选
	$("#cF").click(function(){

		$("input[type=checkbox]").each(function(){
        	 $(this).prop("checked", !$(this).prop("checked"));
         })
	})
	//全选
	$("#cAll").click(function(){
		$("input[type=checkbox]").prop("checked",true);
	})
	//全选取消
	$("#c_dAll").click(function(){
		$("input[type=checkbox]").prop("checked",false);
	})
	$('#submitDel').click(function(){


			   if(confirm('确定要删除')==true) {

						  var text="";
						  $("input:checked").each(function(){
							  if($(this).prop("checked")) {
								  text += $(this).val() + ",";
							  }

						  });

						  if(text==""){
							 alert("请选择要删除的数据!");
							  return false;
						  }
						  else{
							 var tempText = text.substring(0, text.length - 1);
							 $('#did').val(tempText);
						  }
						  return true;

				  }
				  else {
					 return false;
				  }

	 })
	//

	$('.aDel').click(function(){
			return confirm('确定将选择记录删除?');
	 })

})