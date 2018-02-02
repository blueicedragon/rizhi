<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="chinahuhai@hotmail.com">
    <meta name="copyrigt" content="<?php echo (L("Public_Copyright_Start")); ?> chinahuhai@hotmail.com <?php echo (L("Public_Copyright_End")); ?>">
    <title><?php echo (L("Public_Admin")); ?>-<?php echo (L("Public_name")); ?></title>
    <!-- 自定义样式 -->
    <link rel="stylesheet" href="/Admin/Tpl/v20/Public/css/normalize.css">
    <link rel="stylesheet" href="/Admin/Tpl/v20/Public/css/login.css">

    <!--[if lt IE 8]>
    <script>
        window.location.href = './index.php?m=Login&a=browser';
    </script>
    <![endif]-->

</head>
<body>
<div id="bg"></div>
<canvas id="canvas"></canvas>

<div id="i_top">
    <div id="i_logo">鸿奥项目统计系统<em>V1.0</em><span>管理员登录</span></div>
    <div id="i_top_right"></div>
</div>
<!-- end top -->

<div id="i_login_box">

    <span class="title"></span>

    <span class="i_tips" id="i_tips1">请正确输入用户名及密码</span>
    <!-- end tips 类success error -->

    <form id="login_form" action="./index.php?m=Login&a=checkLogin" method="POST">

        <div class="i_form_lay">
            <i class="ico_user"></i>
            <input class="i_form_inp login_name" type="text" name="login_name" placeholder="请输入用户名">
        </div>
        <!-- end lay -->

        <div class="i_form_lay">
            <i class="ico_pw"></i>
            <input class="i_form_inp login_password" type="password" name="login_password" placeholder="请输入密码">
        </div>
        <!-- end lay -->

        <div class="i_form_lay">
            <button class="i_form_button submit" type="submit">登录</button>
        </div>
        <!-- end lay -->

    </form>
    <!-- end form -->

</div>
<!-- end login box -->

<!--<i class="ico_login1"></i>
<i class="ico_login2"></i>
<i class="ico_login3"></i>
<i class="ico_login4"></i>-->


<div class="copyrights">Copyright &copy;  2017 江苏鸿奥信息科技有限公司</div>
<!-- end copyrights -->

<script src="/Admin/Tpl/v20/Public/js/dots.js"></script>
<script src="/Admin/Tpl/v20/Public/js/dots_main.js"></script>

<script src="/Admin/Tpl/v20/Public/js/jquery-1.11.3.js"></script>
<script src="/Admin/Tpl/v20/Public/js/login.js"></script>
</body>
</html>