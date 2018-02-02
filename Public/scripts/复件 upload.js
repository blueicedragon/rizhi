

$(document).ready(function(){
		
		function del_f(){
		$("a.delImg").click(function(){
		var obj = $(this);
			
			$.ajax({   
						url: './index.php?m=Index&a=MyImgDel',   
						type: 'POST',
						data:{'img':$(".imgValue").val()},
						dataType: 'json',   
						//timeout: 1000,   
						error: function(){   
						//alert('Error loading XML document');
						},   
						success: function(data){
							$(obj).siblings('input.upImg').show();
							$(obj).siblings('a.upImg').show();
							$(obj).hide();
							$(".imgValue").attr("value",'');
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
		////
		
		
			
		////////////
		
		function hhh(msg,obj,simg){
			$(obj).attr("value",msg);
			$(obj).parents('li').find('a.upImg').hide();
			$(obj).parents('li').find('input.upImg').hide();
			$(obj).parents('li').find('a.delImg').show();
			$(obj).parents('li').find('del').find('img').attr('src',Public+msg);
			$(obj).parents('li').find('del').find('img').hide();
			$(obj).parents('li').find('del').show();
			$('.jc-demo-box').show();
			
			$('#target').attr('src',Public + msg + "?" + new Date().getTime()).show();
			
			$('.jcrop-preview').attr('src',Public + msg + "?" + new Date().getTime()).show();

			$('input.tu').attr('value',Public+msg);
				
			}
		
		$('.file').change(function(){
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
								   jQuery(function($){

    // Create variables (in this scope) to hold the API and image size
    var jcrop_api,
        boundx,
        boundy,

        // Grab some information about the preview pane
        $preview = $('#preview-pane'),
        $pcnt = $('#preview-pane .preview-container'),
        $pimg = $('#preview-pane .preview-container img'),

        xsize = $pcnt.width(),
        ysize = $pcnt.height();
    
    console.log('init',[xsize,ysize]);
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
    };

  });
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
