<?php
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Rent Project',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.components.helpers.*',
	),

	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'2e',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		'admin'=>array(),
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'caseSensitive'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=rent',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				// エラーが発信したらすぐにADMINにメールで報告する。
					array(
						'class'=>'CEmailLogRoute',
						'levels'=>'error',
						'emails'=>'luckymancvp@gmail.com',
					),
					// デバッグのログをファイルに集める。
					array(
						'class'=>'CFileLogRoute',
						'levels'=>'debug, info',
						'logFile'=>'debug.log',
					),
					// エラーのログをファイルに集める。
					array(
						'class'=>'CFileLogRoute',
						'levels'=>'error',
						'logFile'=>'error.log',
					),
					// 全部のログをファイルに集める。
					array(
						'class'=>'CFileLogRoute',
						'logFile'=>'application.log',
					),
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'luckymancvp@gmail.com',
	),
	'sourceLanguage'=>'en',
	'language'=>'ja',
	'defaultController'=>'home',
	'homeUrl'=>array('/home/index/'),
	'theme'=>'spicy',
);