$(document).ready(function () {

    // 修复虚拟键盘与定位css冲突
    var exHeight = $(window).height();
    var distance=exHeight-$('.s_distance').outerHeight()-$('.s_login_fixed_bottom').outerHeight()-50;
    if(exHeight > 472){ // iphone4等拇指机浏览器真实高度判断
        $('.s_login_fixed_bottom').css('margin-top',distance);
    }

    //返回顶部
    var $bp = $('.s_back_top'),$bt = $bp.find('.s_tri_top');
    $bp.show();
    $bt.click(function (){
        $('.s_main').animate({scrollTop:0},200);
    });
    var st = 0;
    $('.s_main').scroll(function (){
        if($('.s_main').scrollTop() === 0){
            //$bt.slideUp();
            $bt.hide();
            st = 0;
        } else {
            //if(st === 0) $bt.slideDown();
            $bt.show();
            st = 1;
        }
    }).trigger('scroll');

    $(".nicescroll").niceScroll({boxzoom:false});

    $('.re-url').on('click', function () {
        var url = $(this).attr('url');
        window.location.href = url;
        window.location.target = '_blank';
    })

});

/*
*@ 判断是否微信浏览器
*@ return boolean
* */
function isWeiXin(){
    var ua = window.navigator.userAgent.toLowerCase();
    if(ua.match(/MicroMessenger/i) == 'micromessenger'){
        return true;
    }else{
        return false;
    }
}


/*
 * @ 倒计时函数
 * @ param obj jquery对象
 * @ num int Numeric 正整数
 * */
function countDown(obj, num){
    var countDownTime=parseInt(num);
    var timer=setInterval(function(){
        if(countDownTime>=0){
            var minute=Math.floor(countDownTime/60);
            var second=countDownTime-minute*60;
            //$("#countDownTime").text(minute+":"+second);
            $(obj).text(second + '秒后重发');
            countDownTime--;
        }else{
            clearInterval(timer);
            //alert("计时结束,给出提示");
            $(obj).text('获取验证码').attr('disabled', false).removeClass('s_btn_disabled');
        }
    },1000);
}

/*
 * @ 倒计时函数
 * @ param obj jquery对象
 * @ num int Numeric 正整数
 * */
function countDown2(obj, num){
    var countDownTime=parseInt(num);
    var timer=setInterval(function(){
        if(countDownTime>=0){
            var minute=Math.floor(countDownTime/60);
            var second=countDownTime-minute*60;
            //$("#countDownTime").text(minute+":"+second);
            $(obj).text(second);
            countDownTime--;
        }else{
            clearInterval(timer);
            //alert("计时结束,给出提示");
        }
    },1000);
}

// 隐藏提示层
function hideTips() {
    var t = setTimeout(hideHandler,2000);
}
function hideHandler(){
    $('.parent').fadeOut();
}
