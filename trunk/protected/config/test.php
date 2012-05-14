<?php

return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		// preloading 'log' component
		'components'=>array(
			'urlManager'=>array(
				'showScriptName'=>true,
			),
			'db'=>array(
				'enableProfiling'=>true,
			),
			'fixture'=>array(
				'class'=>'system.test.CDbFixtureManager',
			),
			'log'=>array(
				'class'=>'CLogRouter',
				'routes'=>array(
					//テストのためブラウザでひょうじする
					array(
						'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
					),
				),
			),
			'cache'=>array(
				'class'=>'system.caching.CMemCache',
				'servers'=>array(
					array(
						'host'=>'localhost',
						'port'=>11211,
						'weight'=>60,
					),
				),
			),
			/* uncomment the following to provide test database connection
			'db'=>array(
				'connectionString'=>'DSN for test database',
			),
			*/
		),
	)
);
