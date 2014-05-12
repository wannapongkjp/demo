<?php
return new \Phalcon\Config(array(
	'assets' => array(
		'prefix' => 'http://dev.demo.estudent.com/dist/static/' 
	),
	'database' => array(
		'adapter' => 'Mysql',
		'host' => 'localhost',
		'username' => 'root',
		'password' => '',
		'dbname' => 'demo' 
	),
	'application' => array(
		'controllersDir' => __DIR__ . '/../../../app/controllers/',
		'modelsDir' => __DIR__ . '/../../../app/models/',
		'viewsDir' => __DIR__ . '/../../../app/views/',
		'pluginsDir' => __DIR__ . '/../../../app/plugins/',
		'libraryDir' => __DIR__ . '/../../../app/library/',
		'formsDir' => __DIR__ . '/../../../app/forms/',
		'cacheDir' => __DIR__ . '/../../../cache/',
		'baseUri' => '/' 
	),
	'mail' => array(
		'fromName' => 'eStudent Team',
		'fromEmail' => 'aodto.wk@gmail.com',
		'ccEmail' => 'wannapong.kjp@gmail.com',
		'smtp' => array(
			'host' => 'ssl://smtp.googlemail.com',
			'port' => 465,
			'encoding' => 'utf-8',
			'username' => 'tinitour@gmail.com',
			'password' => 'site021229'
		)
	)
));