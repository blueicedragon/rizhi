

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

	$(".textInfo").live("blur",function() {  
		gengxin($("form").serialize());	
	}); 

	//$("input.file").css({"opacity": "0.5" });
	//调出文件浏览
	
	function MathRand() 
		{ 
		var Num=""; 
		for(var i=0;i<6;i++) 
		{ 
		Num+=Math.floor(Math.random()*10); 
		}
		return Num;
	}
		
	//num = $('.g_img').length;
	
	$('.zu_add').click(function(){
		Num = 	MathRand();
		text='<li class="imgUp g_img">';
		text+='<input type="text" name="g_img[]" value="" class="imgValue text" id="upimg'+ Num +'" />';
		text+='<a href="javascript:void(0);" class="upImg">';
		text+='<input type="file" size="13" class="text file" id="fileToUpload'+ Num  +'" name="fileToUpload'+ Num  +'" size="1" style="width:68px" hidefocus="true" maxlength="0" /></a>';
		text+='<input type="button" class="upImg button" />';
		text+='<a href="javascript:void(0);" class="hide delImg" style="display:none;" >';
		text+='<input type="button" value="" class="delImg button" style="border:0px;" /></a>';
		text+='<input name="text[]" value="" type="text" class="text textInfo" />';
		text+='<del class="delImg"><img src="/Admin/Tpl/Public/images/img.jpg" /></del>';		
		text+='<span class="prev"></span><span class="next"></span></li>';
		$(this).before(text);
	
		
		
		del_f();
		
		//num++;
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
		
		$.ajax({   
					url: './index.php?m=Zhubo&a=img_gengxi1',
					type: 'POST',
					data:hk,
					dataType: 'json',   
					//timeout: 1000,   
					error: function(){   
					//alert('Error loading XML document');
					},   
					success: function(data){
						//alert(data);
					}   
				});
		}
	$(function() {
	$('#demo').sortable({
		start: function(event, ui) {
			ui.item.addClass('active');
		},
		stop: function(event, ui) {
			ui.item.removeClass('active').effect(
				'highlight', 
				{ color : '#ccc' }, 500, function() {
				//$.each($('#demo li'), function(index, event) {
				//$(this).children('em').html(parseInt(index, 10)+1);
				//});
				//alert($("form").serialize());
				gengxin($("form").serialize());
			});
		}
		
	});
	//$('#demo').disableSelection();
	
});

})
