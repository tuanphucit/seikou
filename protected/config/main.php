<?php
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Rental Project',

	// preloading 'log' component
	'preload'=>array(
		'log',
		'bootstrap',
	),

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
			'generatorPaths'=> array('bootstrap.gii'),
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
		'bootstrap'=>array(
			'class'=>'ext.bootstrap.components.Bootstrap', // assuming you extracted bootstrap under extensions
			'coreCss'=>true, // whether to register the Bootstrap core CSS (bootstrap.min.css), defaults to true
			'responsiveCss'=>false, // whether to register the Bootstrap responsive CSS (bootstrap-responsive.min.css), default to false
			'plugins'=>array(
				// Optionally you can configure the "global" plugins (button, popover, tooltip and transition)
				// To prevent a plugin from being loaded set it to false as demonstrated below
				'transition'=>false, // disable CSS transitions
				'tooltip'=>array(
					'selector'=>'a.tooltip', // bind the plugin tooltip to anchor tags with the 'tooltip' class
					'options'=>array(
						'placement'=>'bottom', // place the tooltips below instead
					),
				),
				// If you need help with configuring the plugins, please refer to Bootstrap's own documentation:
				// http://twitter.github.com/bootstrap/javascript.html
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
	'language'=>'en',
	'defaultController'=>'home',
	'homeUrl'=>array('/home/index/'),
	'theme'=>'cool',
);