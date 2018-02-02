<?php

	$config = require '../Conf/Config_db.php';
	
	$config_sdk = require '../Home/Conf/config_sdk.php';
	$config = array_merge($config,$config_sdk);
	
	$array = array(
		//调试
		'LOG_RECORD' => false,    // 关闭日志记录
		//'SHOW_PAGE_TRACE'=>true,  //显示调试信息
		'APP_STATUS'		=>'debug',
		'TMPL_STRIP_SPACE'      => false,       // 是否去除模板文件里面的html空格与换行
		
		'APP_FILE_CASE'         => true,   // 是否检查文件的大小写 对Windows平台有效
		'URL_MODEL'       => 0,        			//URL模式
		
		//多语言配置 
		'LANG_SWITCH_ON' => true,
		'DEFAULT_LANG' => 'zh-cn', // 默认语言
		'LANG_AUTO_DETECT' => true, // 自动侦测语言
		'LANG_LIST'=>'en-us,zh-cn,zh-tw,ja,ko,it,ru,fr,de',//必须写可允许的语言列表
		
		////////////////////////////////////////////
		'SESSION_TYPE' => 'db',            			//数据库存储session
    	'SESSION_TABLE' => 'rz_admin_session',   	//存session的表
   		'SESSION_EXPIRE' => 60*60,                	//session过期时间 一个小时无操作 退出
		////////////////////////////////////////////////

	);
	
	return array_merge($config,$array);

?>