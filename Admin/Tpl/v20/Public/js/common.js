$(function(){

    var m1On = $('.i_menu1_on'); //触发菜单1
    var m2On = $('.i_menu2_on'); //触发菜单2
    var m2_1 = $('.i_menu2_on1'); //菜单2左边触发
    var m2_2 = $('.i_menu2_on2'); //菜单2右边触发
    var menu1 = $('#i_menu1'); //菜单1
    var menu2 = $('#i_menu2'); //菜单2
    var menu2Width = parseInt(menu2.css('width')); //菜单2宽度
    var contents = $('#i_contents'); //内容
    var screenWidth = $(window).width(); //屏幕总宽

    contents.css('height', $(window).height()-50 + 'px');
    var flag; //判断
    menu2.length > 0 ? flag = 1 : flag = 0; //初始判断$('#i_menu2')元素是否存在，并赋值

    /* =========== 随屏幕调整 =========== */
    $(window).resize(function () {
        screenWidth = $(window).width(); //屏幕总宽
        contents.css('height', $(window).height()-50 + 'px');
        initializationMenu(); //初始化菜单状态
        column2Autoheight();
    });

    /* =========== 初始菜单判断 =========== */
    initializationMenu(); //初始化菜单状态

    //初始化菜单状态函数
    function initializationMenu(){

        if ( flag == 1) { //$('#i_menu2')元素存在html中
            if (menu1.hasClass('i_drawbank_1') && menu2.hasClass('i_drawbank_2')) {  //2个菜单都收起的情况
                m2_1.hide();
                m2_2.css('left', '50px').show();
                contents.css('width', screenWidth-50 + 'px');
            }else if(menu1.hasClass('i_drawbank_1')){
                m2_2.hide();
                m2_1.css('left', '212px').show();
                contents.css('width', screenWidth-230 + 'px');
            }else if(menu2.hasClass('i_drawbank_2')){
                m2_1.hide();
                m2_2.css('left', '180px').show();
                contents.css('width', screenWidth-180 + 'px');
            }else{
                m2_2.hide();
                m2_1.css('left', 180+menu2Width-18 + 'px').show();
                contents.css('width', screenWidth-menu2Width-180 + 'px');
            }
        }else{ //$('#i_menu2')元素不存在html中
            $('.i_menu2_on').remove();
            if (menu1.hasClass('i_drawbank_1')) { //2个菜单都收起的情况
                $('#i_top_main').addClass('i_off');
                contents.css('width', screenWidth-50 + 'px');
            }else{
                $('#i_top_main').removeClass('i_off');
                contents.css('width', screenWidth-180 + 'px');
            }
        }

        //判断菜单1收缩--显示工具提示
        if($('#i_menu1').attr('class') == 'i_drawbank_1'){
            tooltips($('.i_tooltips'),true);
        }else{
            tooltips($('.i_tooltips'),false);
        }

    }

    /* =========== 菜单1触发左右收缩/展开 =========== */
    m1On.on('click' , function(){
        $('#i_top_main').toggleClass('i_off');
        $('.i_top_logo .icon').toggle();
        if ( flag == 1) { //$('#i_menu2')元素存在html中
            if (menu1.hasClass('i_drawbank_1') && menu2.hasClass('i_drawbank_2')){
                m2_1.hide();
                m2_2.css('left', '180px').show();
                contents.css('width', screenWidth-180 + 'px');
            }else if(menu1.hasClass('i_drawbank_1')){
                m2_2.hide();
                m2_1.css('left', 180+menu2Width-18 + 'px').show();
                contents.css('width', screenWidth-180-menu2Width + 'px');
            }else if(menu2.hasClass('i_drawbank_2')){
                m2_1.hide();
                m2_2.css('left', '50px').show();
                contents.css('width', screenWidth-50 + 'px');
            }else{
                m2_2.hide();
                m2_1.css('left', 50+menu2Width-18 + 'px').show();
                contents.css('width', screenWidth-50-menu2Width + 'px');
            }
        }else{ //$('#i_menu2')元素不存在html中
            if (menu1.hasClass('i_drawbank_1')) { //2个菜单都收起的情况
                contents.css('width', screenWidth-180 + 'px');
            }else{
                contents.css('width', screenWidth-50 + 'px');
            }
        }

        menu1.toggleClass('i_drawbank_1');

        //判断菜单1收缩--显示工具提示
        if($('#i_menu1').attr('class') == 'i_drawbank_1'){
            tooltips($('.i_tooltips'),true);
        }else{
            tooltips($('.i_tooltips'),false);
        }
    });

    /* =========== 菜单2触发左右收缩/展开 =========== */
    m2On.on('click', function(){
        if (menu1.hasClass('i_drawbank_1') && menu2.hasClass('i_drawbank_2')){
            m2_2.hide();
            m2_1.css('left', 50+menu2Width-18 + 'px').show();
            contents.css('width', screenWidth-50-menu2Width + 'px');
        }else if(menu1.hasClass('i_drawbank_1')){
            m2_1.hide();
            m2_2.css('left', '50px').show();
            contents.css('width', screenWidth-50 + 'px');
        }else if(menu2.hasClass('i_drawbank_2')){
            m2_2.hide();
            m2_1.css('left', 180+menu2Width-18 + 'px').show();
            contents.css('width', screenWidth-180-menu2Width + 'px');
        }else{
            m2_1.hide();
            m2_2.css('left', '180px').show();
            contents.css('width', screenWidth-180 + 'px');
        }
    });

    //菜单2触发左按钮
    m2_1.on('click' , function(){
        $(this).hide();
        m2_2.show();
        menu2.toggleClass('i_drawbank_2');
    });

    //菜单2触发右按钮
    m2_2.on('click' , function(){
        $(this).hide();
        m2_1.show();
        menu2.toggleClass('i_drawbank_2');
    });

    /* =========== 1、2级菜单内部切换样式 =========== */
    var leftMenuTitle = $('.i_left_menu_title');

    //有i_on class的默认展开
    leftMenuTitle.each(function(i){
        var jiantou = $(this).find('.i_w50').find('svg').find('use');
        if ($(this).hasClass('i_on')) {
            $(this).next().show();
            jiantou.attr('xlink:href','#icon-xiajiantou');
        } else {
            jiantou.attr('xlink:href','#icon-youjiantou');
        }
    });

    //左栏菜单点击展开/收缩
    leftMenuTitle.on('click',function(){

        $(this).siblings('ul').hide();
        $(this).siblings('div').removeClass('i_on');
        $(this).siblings('div').find('.i_w50').find('svg').find('use').attr('xlink:href','#icon-youjiantou');

        if($(this).hasClass('i_on')){
            $(this).next('ul').hide();
            $(this).removeClass('i_on');

        }else{
            $(this).next('ul').show();
            $(this).addClass('i_on');

        }

        is_show = $(this).next('ul').css('display');

        if(is_show == 'block'){
            $(this).find('.i_w50').find('svg').find('use').attr('xlink:href','#icon-xiajiantou');
        }else{
            $(this).find('.i_w50').find('svg').find('use').attr('xlink:href','#icon-youjiantou');
        }



    });

    //3、4级菜单
    $('.i_has_sub').on('click',function(){
        $(this).find('dl').toggle();
    });

    //表格变色
    $('.tables tbody tr').hover(function(){
        $(this).css('background-color', '#f6f6f6');
    },function(){
        $(this).css('background-color', '#FFF');
    });

    //通用滚动条定义
    $(".i_nicescroll").niceScroll({
        cursorcolor:"#d3d3d3",
        cursoropacitymax:1,
        touchbehavior:false,
        cursorwidth:"5px",
        cursorborder:"0",
        cursorborderradius:"5px"
    });

    // POPUP滚动条
    $(".popup-nicescroll").niceScroll({
        cursorcolor:"#d3d3d3",
        cursoropacitymax:1,
        touchbehavior:false,
        cursorwidth:"5px",
        cursorborder:"0",
        cursorborderradius:"5px"
    });

    //二级菜单自动等高
    autoHeight($('.i_sub_menu_box'),$('.i_sub_menu_box dl'));

    $('.i_top_left_nav').hover(function(){
        $(this).find('a.i_nav_first').addClass('i_on');
        $(this).find('a.i_nav_first').find('svg').find('use').attr('xlink:href','#icon-jiantoushang2');
        $(this).find('.i_sub_menu_box').show();
    },function(){
        $(this).find('a.i_nav_first').removeClass('i_on');
        $(this).find('a.i_nav_first').find('svg').find('use').attr('xlink:href','#icon-arrowDown');
        $(this).find('.i_sub_menu_box').hide();
    });

    $('.i_tri_poplay').hover(function(){
        $(this).addClass('i_on').find('.i_top_right_poplay').show();
    },function(){
        $(this).removeClass('i_on').find('.i_top_right_poplay').hide();
    });

    $('.i_g_tips_close').click(function () {
        $(this).parent().fadeOut();
    });

    // 表单样式2wrap自动等高
    column2Autoheight();

});

/*
 * 元素自动等高函数
 * @ param parent obj 父级对象
 * @ param son    obj 子级对象
 * */
function autoHeight(parent,son){
    var parentHeight = parent.height(); //父级高度
    son.css('height', parentHeight + 'px');
}

/*
* 工具提示
* @ param obj 类名（不可为ID名）
* @ param tipsStatus boolean
* */
function tooltips(obj,tipsStatus){
    obj.each(function(){
       var me = $(this);
       var tips = me.attr('tips') ? me.attr('tips'):'无提示信息';
       var html = '<div class="i_tooltips_box">' +
            '<span class="i_tooltips_triangle"></span>' +
            '<span class="i_tooltips_text">' + tips + '</span>' +
            '</div>';

       if(tipsStatus) {
           me.hover(function () {
               me.append(html);
               me.find('.i_tooltips_box').stop().fadeIn();
           }, function () {
               me.find('.i_tooltips_box').stop().fadeOut().remove();
           });
       }else{
           me.unbind("mouseenter").unbind("mouseleave");
       }

    });
}

/* 表单样式wrap自适应高度 */
function column2Autoheight() {
    var parentHeight = $('.i_box_wrap').parent().height();
    var columnHeight = $('.i_column').height();
    $('.i_box_wrap').css('min-height', parentHeight-columnHeight + 10 + 'px');
}

/*
* 渐隐/渐显元素
* @param obj Jquery对象
* @param flag true为渐显 false为渐隐
* */
function fadeInOutEle(obj, flag=1) {
    if(flag == 1){
        $(obj + ',.mask').stop().fadeIn();
    }else if(flag == 2){
        $(obj).stop().fadeOut();
    }else{
        $(obj + ',.mask').stop().fadeOut();
    }
}


// 弹层关闭事件
$('.popup .close').on('click', function () {
    var dataCloseMask = $(this).attr('data-close-mask');
    $(this).parents('.popup').stop().fadeOut();
    if(dataCloseMask != 'false'){
        $('.mask').stop().fadeOut();
    }
});

// 点击遮罩层关闭弹层
$('.mask').on('click', function () {
    $('.popup').stop().fadeOut();
    $(this).stop().fadeOut();
});

// 默认选项卡
tabs('.tab-title .tabs', '.this-parent', 2);

// 选项卡
function tabs(obj, parent, flag, type){
    $(obj).each(function(index){

        var parents = $(this).parents(parent);
        var liNode = $(this).parents(parent).find(obj).index(this);
        var tabBoxs = parents.find(".tab-box");
        var this_ = $(this);

        if( flag == 1){

            $(this).hover(function(){
                tabsHandler(obj,parents, this_, liNode, tabBoxs, type);
            });

        }else{
            $(this).click(function(){
                tabsHandler(obj,parents, this_, liNode, tabBoxs, type);
            });
        }
    });
}

function tabsHandler(obj, parents, this_, liNode, tabBoxs, type){
    parents.find(obj).removeClass("title-on");
    this_.addClass("title-on");

    if(type == 'fade'){
        tabBoxs.stop().fadeOut();
        tabBoxs.eq(liNode).stop().fadeIn();
    }else{
        tabBoxs.removeClass('show');
        tabBoxs.eq(liNode).addClass('show');
    }
}