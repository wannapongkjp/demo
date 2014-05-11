<?php
/**
 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
 */
$di = new Phalcon\DI\FactoryDefault();

$di->set('config', function (){
	$serverName = isset($_SERVER['SERVER_NAME'])? $_SERVER['SERVER_NAME'] : 'dev.demo.estudent.com';
	switch($serverName){
		case 'dev.demo.estudent.com':
			$environment = 'development';
			break;
		case 'testing.estudent.com':
			$environment = 'testing';
			break;
		default:
			$environment = 'production';
	}
	$settings = include __DIR__ . '/' . $environment . '/config.php';
	return $settings;
}, true);

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->set('url', function () use($di){
	$config = $di->get('config');
	$url = new Phalcon\Mvc\Url();
	$url->setBaseUri($config->application->baseUri);
	$url->setStaticBaseUri($config->assets->prefix);
	return $url;
}, true);

/**
 * add routing capabilities
 */
$di->set('router', function (){
	require __DIR__ . '/routes.php';
	return $router;
}, true);

/**
 * Setting up the view component
 */
$di->set('view', function () use($di){
	$config = $di->get('config');
	$view = new Phalcon\Mvc\View();
	$view->setViewsDir($config->application->viewsDir);
	$view->registerEngines(array(
		'.volt' => function ($view, $di) use($config){
			$volt = new Phalcon\Mvc\View\Engine\Volt($view, $di);
			$volt->setOptions(array(
				'compiledPath' => $config->application->cacheDir,
				'compiledSeparator' => '_' 
			));
			return $volt;
		},
		'.phtml' => 'Phalcon\Mvc\View\Engine\Php' 
	));
	return $view;
}, true);

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->set('db', function () use($di){
	$config = $di->get('config');
	return new Phalcon\Db\Adapter\Pdo\Mysql(array(
		'host' => $config->database->host,
		'username' => $config->database->username,
		'password' => $config->database->password,
		'dbname' => $config->database->dbname,
		"options" => array(
			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' 
		) 
	));
});

/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->set('modelsMetadata', function () use($di){
	return new Phalcon\Mvc\Model\Metadata\Memory();
});

/**
 * Start the session the first time some component request the session service
 */
/*
 * $di->set('session', function (){ $session = new Phalcon\Session\Adapter\Files(); $session->start(); return $session; });
 */
$di->set('session', function () use($di){
	$session = new App\Library\Session\Adapter\Database(array(
		'db' => $di->get('db'),
		'table' => 'sessions',
		'lifetime' => 86400 
	));
	if(!isset($_SESSION)){
		$session->start();
	}
	return $session;
});

// $di->set('flash', function (){
// $flash = new \Phalcon\Flash\Session(array(
// 'error' => 'alert alert-danger',
// 'success' => 'alert alert-success',
// 'warning' => 'alert alert-warning',
// 'notice' => 'alert alert-info'
// ));
// return $flash;
// });
$di->set('flash', function (){
	$flash = new \Phalcon\Flash\Direct(array(
		'error' => 'alert alert-danger',
		'success' => 'alert alert-success',
		'warning' => 'alert alert-warning',
		'notice' => 'alert alert-info' 
	));
	return $flash;
});

/*
 * Authentication Library
 */
$di->set('auth', function () use($di){
	$auth = new App\Library\Auth\Auth($di);
	return $auth;
}, true);

/*
 * Mail Library
 */
$di->set('mail', function () use($di){
	$config = $di->get("config");
	$mail = new App\Library\Mail\PHPMailer();
	$mail->Host = $config->mail->smtp->host;
	$mail->Port = $config->mail->smtp->port;
	$mail->CharSet = $config->mail->smtp->encoding;
	$mail->Username = $config->mail->smtp->username;
	$mail->Password = $config->mail->smtp->password;
	$mail->From = $config->mail->fromEmail;
	$mail->FromName = $config->mail->fromName;
	$mail->addCC($config->mail->ccEmail);
	$mail->addReplyTo($config->mail->fromEmail);
	$mail->SMTPAuth = true;
	$mail->isHTML(true);
	$mail->WordWrap = 100;
	$mail->isSMTP();
	return $mail;
}, true);

/*
 * Cookies
 */
$di->set('cookies', function (){
	$cookies = new Phalcon\Http\Response\Cookies();
	$cookies->useEncryption(true);
	return $cookies;
});

$di->set('crypt', function (){
	$crypt = new Phalcon\Crypt();
	$crypt->setKey('afk;l*&^jhads%$3sfuy$#@kjasdf(*&^ds');
	return $crypt;
});