<?php

$config = require './Conf/Config_db.php';

$array = array(
    //调试
    'LOG_RECORD' => false,    // 关闭日志记录
    //'SHOW_PAGE_TRACE'=>true,  //显示调试信息
    'APP_STATUS'		=>'debug',
    'TMPL_STRIP_SPACE'      => false,       // 是否去除模板文件里面的html空格与换行

    'APP_FILE_CASE'         => true,   // 是否检查文件的大小写 对Windows平台有效
    'URL_MODEL'       => 0,        			//URL模式
    'SESSION_EXPIRE' => 100*60,                	//session过期时间 6000秒无操作 退出
);

return array_merge($config,$array);

?>