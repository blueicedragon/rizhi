$('input#name').focus();//默认INPUT焦点获取
	
	//多国语言显示开始
	$('.right em').hover(
		function(){
			$(this).find('ol').show();
		},
		function(){
			$(this).find('ol').hide();
		}
	)
	//多国语言显示开始结束
	
	
	//点击加载后绑定按钮不被再次执行JS开始
	function button_start(){
		$('button.login').click(function(){
		return false;
		})
	};




void function(){
 var sURL = location.href;
 var sTitle = document.title;
 addFavorite = function(){
        try
        {
            window.external.addFavorite(sURL, sTitle);
        }
        catch (e)
        {
            try
            {
                window.sidebar.addPanel(sTitle, sURL, "");
            }
            catch (e)
            {
				var c = "ctrl";
				if(navigator.platform.match(/mac/i)){
					 c = "command"
				}
                alert("{$Think.lang.Favorite_1}\n\n"+c+"+D\n\n{$Think.lang.Favorite_2}.");
            }
        }
		return false;
    }
   createShortcut = function(){
 
	   var sname  =  document.title.replace(/\s/ig,'');
	   var surl   =	 location.href;
	   document.createshortcuts.furl.value = surl;
	   document.createshortcuts.fname.value = sname;
       document.createshortcuts.submit();
   }
 }();
 