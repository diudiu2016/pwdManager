<?php
return array(
	//'配置项'=>'配置值'
    'DB_TYPE'               =>  'mysqli',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址


    'DB_NAME'               =>  'pwd_manager',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'pwd_',    // 数据库表前缀

    'URL_MODEL'             =>  1,
    'DEFAULT_MODULE'     => 'Home',
    'MODULE_ALLOW_LIST'    =>    array('Home', 'Customer'),
    'SESSION_AUTO_START' => true,
	
    'MAIL_CHARSET'=>'UTF-8',//编码
    'MAIL_AUTH'=>true,//邮箱认证
    'MAIL_HTML'=>true,//true HTML格式 false TXT格式

    'USER_CUSTOMER_STATUS'         =>  1, //用户
    'USER_ADMINI_STATUS'           =>  2 //管理员

);
