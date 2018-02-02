// JavaScript Document
$(document).ready(function(){
	$('#title').change(function(){
			$.ajax({   
				url: './index.php?m=Public&a=splitword',//处理页面地址   
				type: 'POST', 
				data: {'title':$('#title').val(),},
				dataType: 'json',
				cache : false,
				timeout:3000,
				error: function(){
				alert('Error loading XML document');
				},   
				success: function(data){
					if(data.status==0){
						
						}else{
							$('textarea[name=keywords]').attr('value',data.info);
						
						}
				}   
			});				
							
	})						   
})

$(document).ready(function(){
	$('#titleB').click(function(){
		if($('input[name=titleB]').attr('value')==1){
				$('input[name=titleB]').attr('value',2);
				$('input[name=title]').css('font-weight','bold');
			}else if($('input[name=titleB]').attr('value')==2){
				$('input[name=titleB]').attr('value',1);
				$('input[name=title]').css('font-weight','normal');
				}
		
	})						   
})