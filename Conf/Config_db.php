<?php
define('ROOT_PATH',str_replace("\\","/",dirname(__FILE__))."/");  //定义变量

return array(
	
 /* 数据库设置 */
    'DB_TYPE'               => 'mysql',     // 数据库类型www
    'DB_HOST'               => 'localhost', // 服务器地址
    'DB_NAME'               => 'rizhi_db',          // 数据库名
    'DB_USER'               => 'root',      // 用户名
    'DB_PWD'                => '',          // 密码
    'DB_PORT'               => '3306',        // 端口
    'DB_PREFIX'             => 'rz_',    // 数据库表前缀
)
?>