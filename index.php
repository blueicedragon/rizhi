<?php
define('Home_ROOT_PATH', rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR);//物理根目录

ini_set('session.use_trans_sid', 0);//防止出现PHPSEEONID
define('APP_NAME','Home');
define('APP_PATH','Home/');
//ini_set('session.cookie_domain',".ceshi.com");//cookie
define('APP_DEBUG',true); // 开启调试模式True
define('RUNTIME_PATH','./Runtime/'); //定义编译目录

//require './Conf/config_ucenter.php';
//require './uc_client/client.php';

//加载框架入口文件

require './ThinkPHP/ThinkPHP.php';


?>