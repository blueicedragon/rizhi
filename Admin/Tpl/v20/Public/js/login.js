//判断表单是否都输入
$('#login_form .login_name,#login_form .login_password').keyup(function(){
    login_name      = $('.login_name').val();
    login_password  = $('.login_password').val();
    if(login_name.length >= 4 && login_password.length >= 4){
        $('#login_form .submit').removeClass('i_form_disabled');
    }else{
        $('#login_form .submit').addClass('i_form_disabled');
    }
});

//表单提交
$('#login_form .submit').click(function(){
    login_name      = $('.login_name').val();
    login_password  = $('.login_password').val();

    if(!login_name){
        $('.login_name').focus();
        $('#i_tips1').html('请输入用户名');
        return false;
    }

    if(!login_password){
        $('.login_password').focus();
        $('#i_tips1').html('请输入密码');
        return false;
    }

    if(login_name.length < 4){
        $('.login_name').focus();
        $('#i_tips1').html('请检查用户名长度');
        return false;
    }

    if(login_password.length < 4){
        $('.login_password').focus();
        $('#i_tips1').html('请检查密码长度');
        return false;
    }

    if(!$(this).hasClass('i_form_disabled')){
        $('#i_tips1').html('正在验证').addClass('i_green');
        formAction	= $('#login_form').attr('action');
        $.ajax({
            url: formAction,//处理页面地址
            type: 'POST',
            data: {'name':login_name,'password':login_password},
            dataType: 'json',
            cache : false,
            timeout:2000,
            error: function(){
                //超时
                $('#i_tips1').html('登录验证超时,请刷新页面再试').removeClass('i_green');
            },
            success: function(data){
                console.log(data);
                if(data.status==0){
                    //错误
                    $('#i_tips1').html(data.info).removeClass('i_green');
                }else{
                    /////////////////////////////////////////////////////////////////////////
                    //成功
                    $('#i_tips1').html('验证成功,正在跳转...').addClass('i_green');
                    setTimeout(
                        function(){
                            //location.href="http://www.baidu.com";
                            location.href="./index.php?m=Project&a=lists";
                        }
                        ,1000);//延时1秒
                }
            }
        });


    }



    return false;
});