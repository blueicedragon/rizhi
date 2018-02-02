<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta name="author" content="chinahuhai@hotmail.com">
<meta name="copyrigt" content="<?php echo (L("Public_Copyright_Start")); ?> chinahuhai@hotmail.com <?php echo (L("Public_Copyright_End")); ?>">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>鸿奥项目统计系统</title>



<!-- 自定义样式 -->
<link rel="stylesheet" href="./Tpl/v20/Public/css/normalize.css">
<link rel="stylesheet" href="./Tpl/v20/Public/plugins/font_ali/iconfont.css">
<link rel="stylesheet" href="./Tpl/v20/Public/plugins/wifi/wifi.css">
<link rel="stylesheet" href="./Tpl/v20/Public/css/common.css">

<!-- Aliyun icon -->
<script src="./Tpl/v20/Public/plugins/font_ali/iconfont.js"></script>
<script src="./Tpl/v20/Public/js/jquery-1.11.3.js"></script>
<script src="./Tpl/v20/Public/plugins/nicescroll/jquery.nicescroll.js" type="text/javascript"></script>
<script src="./Tpl/v20/Public/plugins/layer/layer.js" type="text/javascript"></script>
<script src="./Tpl/v20/Public/plugins/wifi/wifi.js" type="text/javascript"></script>
<script src="./Tpl/v20/Public/js/common.js"></script>
<script type="text/javascript">Public = '__PUBLIC__/';</script>

<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="stylesheet" type="text/css" href="./Tpl/Public/styles/pagination.css" />
<link rel="stylesheet" type="text/css" href="./Tpl/Public/scripts/calendar/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="./Tpl/Public/scripts/calendar/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="./Tpl/Public/scripts/calendar/win2k.css"/>
<title>渠道管理 - <?php echo (L("Public_Admin")); ?> - <?php echo (L("Public_name")); ?></title>


</head>

<body>

	<?php if($leftnav == left1): ?><!-- .i_drawbank_1存在，表示当前菜单栏是收缩，反之为展开 -->
<div id="i_menu1">
	<div class="i_menu1_on">
		<svg class="icon" aria-hidden="true">
			<use xlink:href="#icon-liebiao1"></use>
		</svg>
	</div>
	<!-- end 菜单1顶部 -->

	<div class="i_menu1_con">

		<div class='i_left_menu_title i_tooltips i_on' tips="项目管理">
			<div class="i_w50">
				<svg class="icon" aria-hidden="true">
					<use xmlns: xlink:href="#icon-youjiantou"></use>
				</svg>
			</div>
			项目管理
		</div>
		<!-- end Level 1 Menu -->

		<ul class="i_left_menu_item">
			<li class="i_tooltips" tips="添加项目">
				<a href="./index.php?m=Project&a=add" <?php if(($left_nav) == "Project-add"): ?>class="i_on"<?php endif; ?>>
					<div class="i_w52">
						<svg class="icon" aria-hidden="true">
							<use xmlns: xlink:href="#icon-liebiao01"></use>
						</svg>
					</div>
					添加项目
				</a>
			</li>
			<!-- loop -->
			<li class="i_tooltips" tips="项目列表">
				<a href="./index.php?m=Project&a=lists" <?php if(($left_nav) == "Project-lists"): ?>class="i_on"<?php endif; ?>>
					<div class="i_w52">
						<svg class="icon" aria-hidden="true">
							<use xmlns: xlink:href="#icon-liebiao4"></use>
						</svg>
					</div>
					项目列表
				</a>
			</li>
			<!-- loop -->
		</ul>
		<!-- end Level 2 Menu -->

		<div class='i_left_menu_title i_tooltips i_on' tips="工作管理">
			<div class="i_w50">
				<svg class="icon" aria-hidden="true">
					<use xmlns: xlink:href="#icon-youjiantou"></use>
				</svg>
			</div>
			工作管理
		</div>
		<!-- end Level 1 Menu -->

		<ul class="i_left_menu_item i_left_menu_item_0 ">
			<li class="i_tooltips" tips="日志列表">
				<a href="./index.php?m=Work&a=listlog" <?php if(($left_nav) == "Work-listlog"): ?>class="i_on"<?php endif; ?>>
					<div class="i_w52">
						<svg class="icon" aria-hidden="true">
							<use xmlns: xlink:href="#icon-liebiao4"></use>
						</svg>
					</div>
					日志列表
				</a>
			</li>
			<!-- loop -->
			<li class="i_tooltips" tips="工时列表">
				<a href="./index.php?m=Work&a=listtime" <?php if(($left_nav) == "Work-listtime"): ?>class="i_on"<?php endif; ?>>
					<div class="i_w52">
						<svg class="icon" aria-hidden="true">
							<use xmlns: xlink:href="#icon-icon-test"></use>
						</svg>
					</div>
					工时列表
				</a>
			</li>
			<!-- loop -->
		</ul>
		<!-- end Level 2 Menu -->

		<div class='i_left_menu_title i_tooltips i_on' tips="用户管理">
			<div class="i_w50">
				<svg class="icon i_icon_small" aria-hidden="true">
					<use xmlns: xlink:href="#icon-qudao"></use>
				</svg>
			</div>
			用户管理
		</div>
		<!-- end Level 1 Menu -->

		<ul class="i_left_menu_item">
			<li class="i_tooltips" tips="添加用户">
				<a href="./index.php?m=User&a=add" <?php if(($left_nav) == "User-add"): ?>class="i_on"<?php endif; ?>>
				<div class="i_w52">
					<svg class="icon" aria-hidden="true">
						<use xmlns: xlink:href="#icon-tianjiayonghu"></use>
					</svg>
				</div>
				添加用户
				</a>
			</li>
			<!-- loop -->
			<li class="i_tooltips" tips="用户列表">
				<a href="./index.php?m=User&a=lists" <?php if(($left_nav) == "User-lists"): ?>class="i_on"<?php endif; ?>>
				<div class="i_w52">
					<svg class="icon" aria-hidden="true">
						<use xmlns: xlink:href="#icon-denglurizhi1"></use>
					</svg>
				</div>
				用户列表
				</a>
			</li>
			<!-- loop -->
		</ul>
		<!-- end Level 2 Menu -->

	</div>
	<!-- end 菜单1内容 -->

</div>
		<?php else: ?>
		<!-- .i_drawbank_1存在，表示当前菜单栏是收缩，反之为展开 -->
<div id="i_menu1">
	<div class="i_menu1_on">
		<svg class="icon" aria-hidden="true">
			<use xlink:href="#icon-liebiao1"></use>
		</svg>
	</div>
	<!-- end 菜单1顶部 -->

	<div class="i_menu1_con">

		<div class='i_left_menu_title i_tooltips i_on' tips="工作管理">
			<div class="i_w50">
				<svg class="icon" aria-hidden="true">
					<use xmlns: xlink:href="#icon-youjiantou"></use>
				</svg>
			</div>
			工作管理
		</div>
		<!-- end Level 1 Menu -->

		<ul class="i_left_menu_item i_left_menu_item_0 ">
			<li class="i_tooltips" tips="添加日志">
				<a href="./index.php?m=Work&a=addlog" <?php if(($left_nav) == "Work-addlog"): ?>class="i_on"<?php endif; ?>>
				<div class="i_w52">
					<svg class="icon" aria-hidden="true">
						<use xmlns: xlink:href="#icon-10109"></use>
					</svg>
				</div>
				添加日志
				</a>
			</li>
			<!-- loop -->
			<li class="i_tooltips" tips="日志列表">
				<a href="./index.php?m=Work&a=listlog" <?php if(($left_nav) == "Work-listlog"): ?>class="i_on"<?php endif; ?>>
					<div class="i_w52">
						<svg class="icon" aria-hidden="true">
							<use xmlns: xlink:href="#icon-liebiao4"></use>
						</svg>
					</div>
					日志列表
				</a>
			</li>
			<!-- loop -->
			<li class="i_tooltips" tips="工时列表">
				<a href="./index.php?m=Work&a=listtime" <?php if(($left_nav) == "Work-listtime"): ?>class="i_on"<?php endif; ?>>
					<div class="i_w52">
						<svg class="icon" aria-hidden="true">
							<use xmlns: xlink:href="#icon-icon-test"></use>
						</svg>
					</div>
					工时列表
				</a>
			</li>
			<!-- loop -->
		</ul>
		<!-- end Level 2 Menu -->


	</div>
	<!-- end 菜单1内容 -->

</div><?php endif; ?>


	

	<div id="i_contents" class="i_nicescroll">
		<div class="i_column g-margin clearfix">
			<ol class="breadcrumb">
				<li>
					<a href="javascript:;">
						<svg class="icon" aria-hidden="true">
							<use xlink:href="#icon-home"></use>
						</svg>
						首页
					</a>
				</li>
				<li><a href="#">工作管理</a></li>
				<li class="active">工时列表</li>
			</ol>

			<div class="i_column_right"></div>
		</div>
		<!-- 栏目导航 -->

		<div class="i_current_column g-margin">
			<span class="i_bold">工时列表</span>
		</div>
		<!-- end 当前栏目 -->

		<form role="form" action="./index.php?m=<?php echo (MODULE_NAME); ?>&a=listtime" method="post">
			<div class="search-form-inline bg-color clearfix">

				<label>人员选择</label>
				<select name="userid" id="userid" class="form-control">
					<option value="0">请选择人员</option>
					<?php if(is_array($ulist)): $k = 0; $__LIST__ = $ulist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><option value="<?php echo ($vo["id"]); ?>" <?php if(($map["userid"]) == $vo["id"]): ?>selected="selected"<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>

				<label>日期</label>
				<input type="text" class="form-control" name="starttime" value="<?php echo ($map["starttime"]); ?>" placeholder="开始日期" id="start_addtime">
				<em>到</em>
				<input type="text" class="form-control" name="endtime" value="<?php echo ($map["endtime"]); ?>" placeholder="结束日期" id="end_addtime">

				<button type="submit" class="btn btn-success">搜索</button>

			</div>
		</form>
		<!-- end search form -->

        <div class="sp clearfix">&nbsp;</div>


        <?php if(($list) == ""): ?><div class="i_nodata g-margin">
                <svg class="icon" aria-hidden="true">
                    <use xlink:href="#icon-msnui-info-inverse"></use>
                </svg>
                该项目下没有数据
            </div>
			<!-- end 无数据 --><?php endif; ?>
		<?php if(($list) != ""): ?><form id="cAll_form" action="./index.php?m=<?php echo (MODULE_NAME); ?>&a=delete" method="post">
				<table class="table g-margin">
					<thead>
					<tr>
						<th width="60">ID</th>
						<th>项目</th>
						<th width="165">工时（小时）</th>
						<th width="200px">开始日期/结束日期</th>
					</tr>
					</thead>
					<tbody>
					<?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
							<td><?php echo ($k); ?></td>
							<td><?php echo ($vo["pname"]); ?></td>
							<td><?php echo ($vo["wtime"]); ?></td>
							<td>
								<?php if($map["starttime"] != null && $map["endtime"] != null): echo ($map["starttime"]); ?>/<?php echo ($map["endtime"]); ?>
									<?php else: ?>
									开始日期/结束日期<?php endif; ?>

							</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>

					<tfoot>
					<tr>
						<td colspan="5" class="i_nopadding_lr i_pos_relative">

							<div class="tfoot-l">&nbsp;</div>

                            <div class="i_pos_right">
                                <div class="table-foot-form">

                                    <div class="pagination">
                                        <?php echo ($page); ?>
                                    </div>
                                    <!-- end 分页 -->

                                </div>
                            </div>
						</td>
					</tr>
					</tfoot>

				</table>
				<!-- end 数据 -->
				<input name="did" value="" id="did" type="hidden"/>
			</form><?php endif; ?>

	</div>



	<?php if($leftnav == left1): ?><!-- 顶部开始 -->
<div id="i_top_main">

    <div class="i_top_logo">
        <svg class="icon" aria-hidden="true">
            <use xlink:href="#icon-iconkongzhitai"></use>
        </svg>
        <span class="i_ctrl">
            鸿奥项目统计系统
        </span>
    </div>
    <!-- end 顶部logo -->

    <div id="i_top_left">
        <div class="i_top_left_nav "><a class="i_nav_first" href="./index.php?m=Index&a=index">首页</a></div>
        <div class="i_top_left_nav "><a class="i_nav_first" href="./index.php?m=Log&a=log_action">日志管理</a></div>
    </div>
    <!-- end 顶部左边 -->

    <div id="i_top_right">
        <span class="wifi js-wifi strong"><i class="wifi-icon"></i><label><s>网络超时</s></label></span>

        <span class="i_tri_poplay">

            <?php echo ($adminInfo['name']); ?>【管理员】
            <div class="i_top_right_poplay">
                <dl>
                    <dd>
                        <a href="./index.php?m=User&a=admin_edit">
                            <svg class="icon" aria-hidden="true">
                                <use xlink:href="#icon-xiugaimima1"></use>
                            </svg>
                            <span>修改密码</span>
                        </a>
                        <a href="./index.php?m=Index&a=cache" class="cache">
                            <svg class="icon" aria-hidden="true">
                                <use xlink:href="#icon-qingli1"></use>
                            </svg>
                            <span>清理缓存</span>
                        </a>
                    </dd>
                    <dt>
                        <a href="./index.php?m=Login&a=logout" class="logout">退出登录</a>
                    </dt>
                </dl>
            </div>
        </span>
    </div>
    <!-- end 顶部右边 -->

</div>
<!-- end 顶部 -->


<script>
$(document).ready(function(){
    var cache_sub = false;
    $('a.cache').click(function (){
        $('.i_top_right_poplay').hide();
        if(cache_sub === true){
            return;
        }
        cache_sub = true;

        formAction = $(this).attr('href');

        cache_ajax(formAction);
        cache_sub = false;
        return false;

    });
    ///////////////////////////////////
    function cache_ajax(formAction) {
        $('.i_g_tips2').show().html('正在清理缓存...');
        $.ajax({
            url: formAction,//处理页面地址
            type: 'GET',
            data: '',
            dataType: 'json',
            async: false,//false为同步  true为异步
            cache: false,
            timeout: 3000,
            error: function () {
                setTimeout(
                        function(){
                            $('.i_g_tips2').show().html('超时,清理失败').addClass('i_Danger');
                            setTimeout(
                                    function () {
                                        $('.i_g_tips2').hide().removeClass('i_Danger');
                                    }, 1000);
                            ///////////////////////////////////////
                        }, 1000);
                cache_sub = false;
            },
            success: function (data) {
                if (data.status == 0) {
                    setTimeout(
                            function(){
                                $('.i_g_tips2').show().html('清理失败,请重试').addClass('i_Danger');
                                setTimeout(
                                        function () {
                                            $('.i_g_tips2').hide().removeClass('i_Danger');
                                        }, 1000);
                                ///////////////////////////////////////
                            }, 1000);
                } else {
                    setTimeout(
                            function(){
                                $('.i_g_tips2').show().html('缓存清理完毕').addClass('i_Success');
                                setTimeout(
                                        function () {
                                            $('.i_g_tips2').hide().removeClass('i_Success');
                                        }, 1000);
                                ///////////////////////////////////////
                            }, 1000);

                }
                cache_sub = false;
            }
        });
    }

    //////////////////////////////////////////////

    //AJAX退出

    $('a.logout').click(function(){
        formAction = $(this).attr('href');
        $('.i_g_tips2').show().html('正在退出...');
        $.ajax({
            url: formAction,//处理页面地址
            type: 'GET',
            data: '',
            dataType: 'json',
            cache : false,
            timeout:3000,
            error: function(){
                $('.i_g_tips2').show().html('退出失败').addClass('i_Danger');
                setTimeout(
                        function(){
                            $('.i_g_tips2').hide().removeClass('i_Danger');
                        }
                        ,1000);//延时1秒
            },
            success: function(data){
                if(data.status==0){
                    $('.i_g_tips2').show().html(data.info);
                    setTimeout(
                            function(){
                                $('.i_g_tips2').hide();
                            }
                            ,1000);//延时1秒
                }else{
                    setTimeout(
                            function(){
                                $('.i_g_tips2').show().html(data.info).addClass('i_Success');
                                setTimeout(
                                        function () {
                                            $('.i_g_tips2').hide().removeClass('i_Success');
                                            location.href="./index.php?m=Login&a=index";
                                        }, 1000);
                                ///////////////////////////////////////
                            }, 1000);
                }
            }
        });
        return false;
    });
    /////////////////////////////////////////////////

});
</script>
		<?php else: ?>
		<!-- 顶部开始 -->
<div id="i_top_main">

    <div class="i_top_logo">
        <svg class="icon" aria-hidden="true">
            <use xlink:href="#icon-iconkongzhitai"></use>
        </svg>
        <span class="i_ctrl">
            鸿奥项目统计系统
        </span>
    </div>
    <!-- end 顶部logo -->

    <div id="i_top_left">
        <div class="i_top_left_nav "><a class="i_nav_first" href="./index.php?m=Index&a=index">首页</a></div>

    </div>
    <!-- end 顶部左边 -->

    <div id="i_top_right">
        <span class="wifi js-wifi strong"><i class="wifi-icon"></i><label><s>网络超时</s></label></span>

        <span class="i_tri_poplay">

            <?php echo ($adminInfo['name']); ?>【用户】
            <div class="i_top_right_poplay">
                <dl>
                    <dd>
                        <a href="./index.php?m=User&a=admin_edit">
                            <svg class="icon" aria-hidden="true">
                                <use xlink:href="#icon-xiugaimima1"></use>
                            </svg>
                            <span>修改密码</span>
                        </a>
                        <a href="./index.php?m=Index&a=cache" class="cache">
                            <svg class="icon" aria-hidden="true">
                                <use xlink:href="#icon-qingli1"></use>
                            </svg>
                            <span>清理缓存</span>
                        </a>
                    </dd>
                    <dt>
                        <a href="./index.php?m=Login&a=logout" class="logout">退出登录</a>
                    </dt>
                </dl>
            </div>
        </span>
    </div>
    <!-- end 顶部右边 -->

</div>
<!-- end 顶部 -->


<script>
$(document).ready(function(){
    var cache_sub = false;
    $('a.cache').click(function (){
        $('.i_top_right_poplay').hide();
        if(cache_sub === true){
            return;
        }
        cache_sub = true;

        formAction = $(this).attr('href');

        cache_ajax(formAction);
        cache_sub = false;
        return false;

    });
    ///////////////////////////////////
    function cache_ajax(formAction) {
        $('.i_g_tips2').show().html('正在清理缓存...');
        $.ajax({
            url: formAction,//处理页面地址
            type: 'GET',
            data: '',
            dataType: 'json',
            async: false,//false为同步  true为异步
            cache: false,
            timeout: 3000,
            error: function () {
                setTimeout(
                        function(){
                            $('.i_g_tips2').show().html('超时,清理失败').addClass('i_Danger');
                            setTimeout(
                                    function () {
                                        $('.i_g_tips2').hide().removeClass('i_Danger');
                                    }, 1000);
                            ///////////////////////////////////////
                        }, 1000);
                cache_sub = false;
            },
            success: function (data) {
                if (data.status == 0) {
                    setTimeout(
                            function(){
                                $('.i_g_tips2').show().html('清理失败,请重试').addClass('i_Danger');
                                setTimeout(
                                        function () {
                                            $('.i_g_tips2').hide().removeClass('i_Danger');
                                        }, 1000);
                                ///////////////////////////////////////
                            }, 1000);
                } else {
                    setTimeout(
                            function(){
                                $('.i_g_tips2').show().html('缓存清理完毕').addClass('i_Success');
                                setTimeout(
                                        function () {
                                            $('.i_g_tips2').hide().removeClass('i_Success');
                                        }, 1000);
                                ///////////////////////////////////////
                            }, 1000);

                }
                cache_sub = false;
            }
        });
    }

    //////////////////////////////////////////////

    //AJAX退出

    $('a.logout').click(function(){
        formAction = $(this).attr('href');
        $('.i_g_tips2').show().html('正在退出...');
        $.ajax({
            url: formAction,//处理页面地址
            type: 'GET',
            data: '',
            dataType: 'json',
            cache : false,
            timeout:3000,
            error: function(){
                $('.i_g_tips2').show().html('退出失败').addClass('i_Danger');
                setTimeout(
                        function(){
                            $('.i_g_tips2').hide().removeClass('i_Danger');
                        }
                        ,1000);//延时1秒
            },
            success: function(data){
                if(data.status==0){
                    $('.i_g_tips2').show().html(data.info);
                    setTimeout(
                            function(){
                                $('.i_g_tips2').hide();
                            }
                            ,1000);//延时1秒
                }else{
                    setTimeout(
                            function(){
                                $('.i_g_tips2').show().html(data.info).addClass('i_Success');
                                setTimeout(
                                        function () {
                                            $('.i_g_tips2').hide().removeClass('i_Success');
                                            location.href="./index.php?m=Login&a=index";
                                        }, 1000);
                                ///////////////////////////////////////
                            }, 1000);
                }
            }
        });
        return false;
    });
    /////////////////////////////////////////////////

});
</script><?php endif; ?>


	<script type="text/javascript">Public = '__PUBLIC__/';</script>

	<!-- 信息层 start -->
	<div class="i_g_tips">

		<div class="i_g_tips1" style="display: none">
        <span class="i_g_tips_close i_g_tips1_close">
            <svg class="i_icon" aria-hidden="true">
                <use xmlns: xlink:href="#i_icon-tubiaozitihua03"></use>
            </svg>
        </span>
			信息提示内容信息提示内容信息提示内容信息提示内容信息提示内容信息提示内容信息提示内容信息提示内容信息提示内容，宽高可自动增长
		</div>
		<!-- end tips1 -->

		<span class="i_g_tips2" style="display: none">
            提示信息层
            <span class="i_g_tips_close i_g_tips2_close">
                <svg class="i_icon i_icon_small" aria-hidden="true">
                    <use xmlns: xlink:href="#i_icon-tubiaozitihua03"></use>
                </svg>
            </span>
        </span>

	</div>
	
	<script type="text/javascript" src="./Tpl/Public/scripts/calendar/calendar.js"></script>
	<script type="text/javascript" src="./Tpl/Public/scripts/calendar/lang/en.js"></script>
	<script type="text/javascript" src="./Tpl/v20/Public/js/del.js"></script>
	<script>
        Calendar.setup({
            weekNumbers: true,
            inputField : "start_addtime",
            trigger    : "start_addtime",
            dateFormat: "%Y-%m-%d",
            showTime: false,
            minuteStep: 1,
            onSelect   : function() {this.hide();}
        });
        Calendar.setup({
            weekNumbers: true,
            inputField : "end_addtime",
            trigger    : "end_addtime",
            dateFormat: "%Y-%m-%d",
            showTime: false,
            minuteStep: 1,
            onSelect   : function() {this.hide();}
        });
	</script>
	<script>
		$(document).ready(function () {
			$('td.status span').click(function () {
				var id = $(this).attr('id').substring(6);
				$.ajax({
					url: "<?php echo U('Agent/isOk');?>",
					type: 'POST',
					data: {'id': id},
					dataType: 'json',
					cache: false,
					timeout: 2000,
					error: function () {
                        alert("操作失败，请稍后重试！");
					},
                    success: function(res) {
                        if(res.status == 0){
                            alert(res.msg);
                        }else{
                            if(res.info =='1'){
                                $("#status"+id).attr('state',res.info).text('通过');
                            }else{
                                $("#status"+id).attr('state',res.info).text('失败');
                            }
                        }
                    }
				});
			});
            $('td.paymoney input').click(function () {
                var id = $(this).attr('id').substring(8);
                if($(this).hasClass("on")){
					alert("请勿重复操作!");
				}else{
                    $.ajax({
                        url: "<?php echo U('Agent/payMoney');?>",
                        type: 'POST',
                        data: {'id': id},
                        dataType: 'json',
                        cache: false,
                        timeout: 2000,
                        error: function () {
                            alert("获取失败，请稍后重试！");
                        },
                        success: function (res) {
                            if (res.status == 0) {
                                $("#paymoney" + id).addClass("on");
                                $("#paymoney" + id).parent().children("span").html(res.msg);
                            } else {
                                $("#paymoney" + id).addClass("on");
                                $("#paymoney" + id).parent().children("span").html(res.info);
                            }
                        }
                    });
				}
            });
		});
	</script>

	<!--/*/////////////////////////////////////////////////////////////*/-->
<style>
#zhezhao {
    background: #000;
    filter: alpha(opacity=50);
    opacity: 0.5;
    position: absolute;
    top: 0px;
    left: 0px;
    width: 100%;
    height: 100%;
    z-index: 10000;
    display: none;
}
#loading{
width:50px;
height:100px;
position:absolute;
top:45%;
left:100px;
font-size:40px;
color:#000000;
display:none;
}
</style>
<div id="zhezhao"></div>
<div id="loading">
	<!--<i class="fa fa-spinner fa-spin"></i>-->
	<!--<img src="/Public/images/timg.gif">-->
</div>
<script>
///
/*$(document).ajaxStart(function(){
	zhezhao_Start();
});
$(document).ajaxStop(function(){
	setTimeout('zhezhao_Stop()',500);
});
$(document).ajaxSuccess(function(){
	setTimeout('zhezhao_Stop()',500);
});*/

function pageHeight() {
	return document.body.scrollHeight;
}
function pageWidth() {
	return document.body.scrollWidth;
}

function zhezhao_Start(){
	$("#zhezhao").height(pageHeight());
	$("#zhezhao").show();
	$("#loading").css('left',pageWidth()/2-25);
	$("#loading").show();
}

function zhezhao_Stop(){
	$("#zhezhao").hide();
	$("#loading").hide();
}

</script>
<!--/*/////////////////////////////////////////////////////////////*/-->
	<!--显示二维码-->
	<a id="qrclose" href="#">关闭</a>
	<div id="qrcode"></div>
	<style>
		#qrcode{
			width:200px;
			height:200px;
			position: absolute;
			left:50%;
			margin-left: -100px;
			top:40%;
			background: #00a0e9;
			display: none;
		}
		#qrclose{
			position: absolute;
			left:50%;
			margin-left: 75px;
			top:40%;
			margin-top: -15px;
			color: #ff0000;
			display: none;
		}
	</style>
</body>
</html>