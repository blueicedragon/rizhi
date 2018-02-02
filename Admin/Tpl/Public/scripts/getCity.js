$(document).ready(function(){
	$('.getCity').click(function(){
		obj = $(this);
		
		if($(obj).hasClass('ajax')){
			return false;
		}
		
		$(obj).addClass('ajax');
		
		
		$(obj).html('正在获取,请稍后...');
		$.ajax({   
				url: './index.php?m=Index&a=getCity',//处理页面地址   
				type: 'POST', 
				data: {},
				dataType: 'html',
				cache : false,
				timeout:3000,
				error: function(){
					$(obj).html('获取失败,点击可再次获取');
					$(obj).removeClass('ajax');
					
				},   
				success: function(data){
					if(data){
						$(obj).html(data);
					}
					$(obj).removeClass('ajax');
				}   
			});	
	
	});
	
	////////////////////////////////
	$('.getCity_old').click(function(){
		oldip = $('.getCity_old').attr('msg');
		$('.getCity_old').html('正在获取,请稍后...');
		$.ajax({   
					url: './index.php?m=Index&a=getCity',//处理页面地址   
					type: 'POST', 
					data: {'ip':oldip},
					dataType: 'html',
					cache : false,
					timeout:3000,
					error: function(){
						$('.getCity_old').html('获取失败,点击可再次获取');
					},   
					success: function(data){
						
						if(data){
							$('.getCity_old').html(data);
							
							}
					}   
				});	
	});
	////////////////////////////////
	
})