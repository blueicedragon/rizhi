

$(document).ready(function(){
		function hhh(msg,obj){
			$(obj).attr("value",msg);
			$(obj).siblings('a.upImg').hide();
			$(obj).siblings('input.upImg').hide();
			$(obj).siblings('a.delImg').show();
			$(obj).siblings('del').find('img').attr('src',Public+msg);
			$(obj).siblings('del').find('img').show();
			$(obj).siblings('del').show();
				if($(obj).parents('li').hasClass('g_img')){
					gengxin($("form").serialize());
				}
			}
	$('.img_list li span.prev').click(function(){
		if($('.img_list li').index($(this).parents('li'))==0){

			}else{
				var obj= $(this).parents('li');
				obj.insertBefore(obj.prev());
				gengxin($("form").serialize());
				del_f();
				}									   
	})
	$('.img_list li span.next').click(function(){
		img_num =$('.img_list li').length;
		//alert($('.img_list li').length);
		img_num= img_num-2;
		
		if($('.img_list li').index($(this).parent('li'))==img_num){
			
			}else{
				var obj= $(this).parents('li');
				obj.insertAfter(obj.next());
				gengxin($("form").serialize());
				del_f();
				}		
											   
	})
	
	//$("input.file").css({"opacity": "0.5" });
	//调出文件浏览
	num = $('.img_list li').length;

	$('.zu_add').click(function(){
		text='<li class="imgUp g_img">';
		text+='<input type="text" name="g_img[]" value="" class="imgValue text" id="upimg0" />';
		text+='<a href="javascript:void(0);" class="upImg">';
		text+='<input type="file" size="13" class="text file" id="fileToUpload'+ num +'" name="fileToUpload'+ num +'" size="1" style="width:68px" hidefocus="true" maxlength="0" /></a>';
		text+='<input type="button" class="upImg button" />';
		text+='<a href="javascript:void(0);" class="hide delImg" style="display:none;" >';
		text+='<input type="button" value="" class="delImg button" style="border:0px;" /></a>';
		text+='<del class="delImg"><img src="/Admin/Tpl/Public/images/img.jpg" /></del>';		
		text+='<span class="prev"></span><span class="next"></span></li>';
		$(this).before(text);
		
		
		$('.img_list li span.prev').click(function(){
			if($('.img_list li').index($(this).parents('li'))==0){
	
				}else{
					var obj= $(this).parents('li');
					obj.insertBefore(obj.prev());
					gengxin($("form").serialize());
					del_f();
					}									   
		})
		$('.img_list li span.next').click(function(){
			img_num =$('.img_list li').length;
			//alert($('.img_list li').length);
			img_num= img_num-2;
			
			if($('.img_list li').index($(this).parent('li'))==img_num){
				
				}else{
					var obj= $(this).parents('li');
					obj.insertAfter(obj.next());
					gengxin($("form").serialize());
					del_f();
					}		
												   
		})
		
		del_f();
		
		num++;
	})
	function del_f(){
		$("a.delImg").click(function(){
		var obj = $(this);
		
		$.ajax({   
					url: './index.php?m=Public&a=imgdel',   
					type: 'POST',
					data:{'img':'../Public/'+$(obj).siblings(".imgValue").val()},
					dataType: 'json',   
					//timeout: 1000,   
					error: function(){   
					//alert('Error loading XML document');
					},   
					success: function(data){
						$(obj).siblings('input.upImg').show();
						$(obj).siblings('a.upImg').show();
						$(obj).hide();
						$(obj).siblings(".imgValue").attr("value",'');
						$(obj).siblings('del').find('img').hide();
						if($(obj).parents('li').hasClass('g_img')){
							$(obj).parents('li').remove();
							gengxin($("form").serialize());
						}
					}   
				});
		})
	}
	del_f();
	/////
	$('.file').live('change',function(){
		obj=$(this).parents('a').siblings('.imgValue');
		$.ajaxFileUpload
			(
				{
					url:'../Public/doajaxfileupload.php?name=' + $(this).attr("name"),
					secureuri:false,
					fileElementId:$(this).attr('id'),
					dataType: 'json',
					success: function (data, status)
					{
						if(typeof(data.error) != 'undefined')
						{
							if(data.error != '')
							{
								alert(data.error);
							}else
							{
								hhh(data.msg,obj);
								
							}
						}
					},
					error: function (data, status, e)
					{
						alert(e);
					}
				}
			)
	})
	
	//更新写库
	function gengxin(hk){
		//alert($("form").serialize());
		$.ajax({   
					url: './index.php?m=Products&a=img_gengxi',   
					type: 'POST',
					data:hk,
					dataType: 'json',   
					//timeout: 1000,   
					error: function(){   
					//alert('Error loading XML document');
					},   
					success: function(data){
						
					}   
				});
		}

})
