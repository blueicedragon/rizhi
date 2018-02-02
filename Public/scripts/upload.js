$(document).ready(function(){
	
		function hhh(msg,obj,simg){
			$(obj).attr("value",msg);
			$(obj).parents('li').find('del').find('img').attr('src',Public+msg);
			$(obj).parents('li').find('del').find('img').hide();
			$(obj).parents('li').find('del').show();
			$('.jc-demo-box').show();
			
			$('.queren').show();
			$("a.del").show();
			$("input.file").attr('value','').hide();
			$('#target').attr('src',Public + msg + "?" + new Date().getTime()).show();

			$('.jcrop-preview').attr('src',Public + msg + "?" + new Date().getTime()).show();
	
			$('input.tu').attr('value',Public + msg);
				
			}
		
		$(document).on('change',".file",function(){

		obj=$('.imgValue');
		
		$.ajaxFileUpload
			(
				{
					url:'../Public/Myfileup.php?name=' + $(this).attr("name"),
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
								
								hhh(data.msg,obj,data.simg);
								  //
								  
								 var jcrop_api,
									boundx,
									boundy,
								 $preview = $('#preview-pane'),
									$pcnt = $('#preview-pane .preview-container'),
									$pimg = $('#preview-pane .preview-container img'),
							
									xsize = 150,
									ysize = 150;
								$('#target').Jcrop({
									onChange: updatePreview,
								  onSelect: updatePreview,
								  aspectRatio: xsize / ysize
								},function(){
								  // Use the API to get the real image size
								  var bounds = this.getBounds();
								  	boundx = bounds[0];
								  	boundy = bounds[1];
									wbei =data.weight/boundx;
									hbei =data.height/boundy;
								  // Store the API in the jcrop_api variable
								  jcrop_api = this;
							
								  // Move the preview into the jcrop container for css positioning
								  $preview.appendTo(jcrop_api.ui.holder);
								});
 
								  var $preview = $('#preview');
								  // Our simple event handler, called from onChange and onSelect
								  // event handlers, as per the Jcrop invocation above
								  function updatePreview(c)
								  {
									if (parseInt(c.w) > 0)
									  {
										var rx = xsize / c.w;
										var ry = ysize / c.h;
								
										$pimg.css({
										  width: Math.round(rx * boundx) + 'px',
										  height: Math.round(ry * boundy) + 'px',
										  marginLeft: '-' + Math.round(rx * c.x) + 'px',
										  marginTop: '-' + Math.round(ry * c.y) + 'px'
										});
										 c.y = Math.round(wbei*c.y);
										 c.x = Math.round(wbei*c.x);
										 c.w = Math.round(wbei*c.w);
										 c.h= Math.round(wbei*c.h);
										 $('#x').val(c.x);
										  $('#y').val(c.y);
										  $('#w').val(c.w);
										  $('#h').val(c.h);
									  }
								  }
								

								//
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

})
