
//手机验证方法
function validatemobile(mobile){
        if(mobile.length==0)
        {
          alert('请输入手机号码！');
           return false;
        }    
        if(mobile.length!=11)
        {
           alert('请输入有效的手机号码！');
            return false;
        }
        
       // var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|147|170|(18[0-9]{1}))+\d{8})$/;
		var myreg = /^0?(13[0-9]|15[012356789]|18[0236789]|14[57])[0-9]{8}$/;
        if(!myreg.test(mobile))
        {
            alert('请输入有效的手机号码！');
            return false;
        }
}

//JS 验证Email  
function isEmail(str) { 
       var myReg = /^[-._A-Za-z0-9]+@([_A-Za-z0-9]+\.)+[A-Za-z0-9]{2,3}$/; 
       if (myReg.test(str)){
             return true; 
        }  
         return false; 
}

 
//验证电话号码
  
function isTel(str){  
	if (str != ""){   
	var pattern=/^[+]{0,1}(\d){1,3}[ ]?([-]?((\d)|[ ]){1,12})+$/;   
	var flag = pattern.test(str); 
 		if(!flag){  
			alert("提示:请正确输入如下格式电话号码:010-52888888！");  
			return false; 
 		}else{  
   		return true; 
		} 
 
	} 
} 
  
//验证QQ  
function isQQ(str){  
	if (str != ""){   
	var pattern=/^\d+(\.\d+)?$/; 
	var flag = pattern.test(str); 
		if(!flag){  
		alert("提示:请正确输入数字格式的QQ号！");     
		return false; 
		}else{  
		
			return true; 
		} 
	}
} 
  
//验证E-mail 
function isEmail(str){  
  if (str != ""){  
  	var pattern=/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/; 
	var flag = pattern.test(str); 
		if(!flag){  
			alert("提示:请正确输入如下格式的电子邮箱地址：abc@xxx.com");  
			return false; 
		}else{  
			return true; 
			} 
	}else{
		alert("请输入电子邮箱地址！");     
		return false; 
		}
}  

//验证密码
function isPass(pass1,pass2){
		if(pass1==""){
				alert("请输入密码！");
				return false;
			} 
		if(pass2==""){
			alert("请输入确认密码！");
			return false;
			}
		if(pass2){
				if(pass2!==pass1){
				alert("两次输入的密码不一致！");
				return false;
				}
			}
		
			
		if(pass1.length < 6){
			alert("密码至少需要6位！");
			return false;
			}
	}

//拦截特殊字符   
function CheckCode(t,obj_name) {  
    var Error = "";  
    var re = /^[^@\/\'\\\"#$%&\^\*]+$/;
    if (!re.test(t)) {  
        Error = obj_name+"中不可含有特殊字符数字或者空格!";  
		alert(Error); 
		return false;
    }  
     
}  

