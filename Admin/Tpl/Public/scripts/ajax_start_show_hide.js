$(document).ready(function(){
	$('td.status').click(function(){
		id = $(this).attr('msg');
		obj= $(this);
		$.ajax({   
				url: './index.php?m='+ MODULE_NAME +'&a=c_status',//处理页面地址   
				type: 'GET', 
				data: {'id':id},
				dataType: 'json',
				cache : false,
				timeout:3000,
				error: function(){
				alert('Error loading XML document');
				},   
				success: function(data){
					if(data.status==0){
						alert('失败');
					}else{
						if(data.info==0){
							$(obj).html('<span class="gray">否</span>');
						}else{
							$(obj).html('<span class="green">是</span>');
							
						}
					}	
				}   
			});		
		return false;
	});
	
	
});