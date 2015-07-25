<?php
return array(
	//'配置项'=>'配置值'
	'SHOW_PAGE_TRACE' =>true, // 显示页面Trace信息
	
	// 数据库配置信息
	'DB_TYPE'   => 'mysql', // 数据库类型
	'DB_HOST'   => 'localhost', // 服务器地址
	'DB_NAME'   => 'duk', // 数据库名
	'DB_USER'   => 'dukName', // 用户名
	'DB_PWD'    => 'dukPassword', // 密码
	'DB_PORT'   => 3306, // 端口
	'DB_PREFIX' => '', // 数据库表前缀
	'DB_PARAMS' => array(\PDO::ATTR_CASE => \PDO::CASE_NATURAL),//数据库字段名不强制小写

	//'URL_MODEL' => 0,//路由模式
	
	'SESSION_AUTO_START'    => true,    // 是否自动开启Session
	
	// 'TOKEN_ON'=>true,  // 是否开启令牌验证
	// 'TOKEN_NAME'=>'__hash__',    // 令牌验证的表单隐藏字段名称
	// 'TOKEN_TYPE'=>'md5',  //令牌哈希验证规则 默认为MD5
	// 'TOKEN_RESET'=>true,  //令牌验证出错后是否重置令牌 默认为true
);