// JavaScript Document


$(document).ready(function(){
	////////////////////////////
	//禁止右键
	$(document).bind("contextmenu",function(e){   
          //return false;   
    });
	
	/////////////////////////////////////////////////////////////////////////////////////
	$("input.number").keyup(function () {
			//数字
			this.value = this.value.replace(/[^\d]/g, '').replace(/(\d{4})(?=\d)/g, "$1");
			
			if($(this).val()==0){
				$(this).val(1)
			}else if($(this).val() < 1){
				this.value(1);
			}else{
				
			}
			
         })
	//LEFT导航///////////////////////////////////////////////////////////////
	$('.left dl dt').click(function(){
		if($(this).parents('dl').find('dd').css('display')=="block"){
			$(this).parents('dl').find('dd').hide();
			$(this).addClass('on');
		}else{
			$(this).parents('dl').find('dd').show();
			$(this).removeClass('on');
		}
			
	});
	///////////////////////////////////////////////////////////////////////
	
	
	
	var cache_sub = false;
	$('a.cache').click(function(){
		
		if(cache_sub === true){
			return;
		}
		
		cache_sub = true;
		
		formAction = $(this).attr('href');
		$('#top em').html('正在清理缓存...').slideDown();
		
		
		$("#zhezhao").height(pageHeight());
		$("#zhezhao").show();
		$("#loading").css('left',pageWidth()/2-25);
		$("#loading").show();

		//////////////////////////////////////
		/*function sleep(d){
		  for(var t = Date.now();Date.now() - t <= d;);
		}
		sleep(5000);*/
		////////////////////////////
		
		cache_ajax(formAction);
		cache_sub = false;	
		return false;						
								
	});
	///////////////////////////////////
	function cache_ajax(formAction){
		$.ajax({   
			url: formAction,//处理页面地址   
			type: 'GET', 
			data: '',
			dataType: 'json',
			async: false,//false为同步  true为异步 
			cache : false,
			timeout:3000,
			error: function(){
				$('#top em').addClass('success').html('清理失败了'); 
				cache_sub = false;
			},   
			success: function(data){
				if(data.status==0){
					//错误的
					}else{
					$('#top em').addClass('success').html(data.info); //成功的
					setTimeout(
						function(){
						$('#top em').slideUp();
						//////////////////////////////////////
						setTimeout(
							function(){
							$('#top em').html('').removeClass("success");
							},1000);
							///////////////////////////////////////
						},1000);

					}
				cache_sub = false;
			}   
		});						  	
	}
	//////////////////////////////////////////////
	//AJAX退出
	
	$('#top a.logout').click(function(){
		formAction = $(this).attr('href');
		$('#top em').html('正在退出...').show();
		$.ajax({   
			url: formAction,//处理页面地址   
			type: 'GET', 
			data: '',
			dataType: 'json',
			cache : false,
			timeout:3000,
			error: function(){
				setTimeout(
						function(){
							$('#top em').addClass('success').html('退出失败'); 
							location.href="./index.php?m=Index&a=index"
						}
						,1000);//延时1秒 
				
			},   
			success: function(data){
				if(data.status==0){
					setTimeout(
						function(){
							$('#top em').addClass('success').html(data.info);
							location.href="./index.php?m=Index&a=index"
						}
						,1000);//延时1秒
					}else{
					
					$('#top em').addClass('success').html(data.info); //成功的
					
					setTimeout(
						function(){
							$('#top em').hide('1000').html('').removeClass("success");
							location.href="./index.php?m=Login&a=index"
						}
						,1000);//延时1秒 

					}
			}   
		});						  
				
		return false;
		
	});
	/////////////////////////////////////////////////
			
});