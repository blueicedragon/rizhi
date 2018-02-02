	KindEditor.ready(function(K) {
				var colorpicker;
				K('#colorpicker').bind('click', function(e) {
					e.stopPropagation();
					if (colorpicker) {
						colorpicker.remove();
						colorpicker = null;
						return;
					}
					var colorpickerPos = K('#colorpicker').pos();
					colorpicker = K.colorpicker({
						x : colorpickerPos.x,
						y : colorpickerPos.y + K('#colorpicker').height(),
						z : 19811214,
						selectedColor : 'default',
						noColor : '无颜色',
						click : function(color) {
							K('#color').val(color);
							$('#title').css('color',color);
							colorpicker.remove();
							colorpicker = null;
						}
					});
				});
				K(document).click(function() {
					if (colorpicker) {
						colorpicker.remove();
						colorpicker = null;
					}
				});
			});
	
