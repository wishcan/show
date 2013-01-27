<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'后台管理',
	'defaultController'=>'index',
	// preloading 'log' component
	'preload'=>array('log'),
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),
	'language'=>'zh_cn',
	'aliases' => array(
		'xupload' => 'ext.xupload',
		'upload'=>'C:/wamp/www',
	),
	'modules'=>array(
		// uncomment the following to enable the Gii tool
	
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'1234',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
            'Admin'=>array(
                
            ),
		
	),

	// application components
	'components'=>array(
		// 'cache'=>array(
		// 	'class'=>'system.caching.CMemcache',
		// 	'servers'=>array(
		// 		 array('host'=>'localhost','port'=>11211,'weight'=>60),
		// 		// array('host'=>'server2','post'=>11211,'weight'=>40),
		// 		),

		//	),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		'VideoUrlParser'=>array(
				
			),

		// uncomment the following to enable URLs in path-format

		'urlManager'=>array(
			'urlFormat'=>'path',
			// 'showScriptName' => false, //去除index.php
			'urlSuffix'=>'.html', //加上.html
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'gallery'=>'gallery/index',
				'shey'=>'gallery/shey',
				'ada'=>'gallery/ada',
				'news'=>'news/index',
				'duyi'=>'news/duyi',
				'shipin'=>'video/index',
				'pinlun'=>'news/pinglun',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				'news/<nid:\d+>'=>'news/neirong?nid',
				

			),
		),
	
//		'db'=>array(
//			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
//		),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=blyy',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'index/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			
				#在页面内显示LOGO信息	
				array(
					'class'=>'CWebLogRoute',
					'levels'=>'trace,info,error,warning,xdebug',
					'showInFireBug'=>true,
				),
				
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);