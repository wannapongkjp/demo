<?php
$router = new \Phalcon\Mvc\Router(false);

/*
 * Authentication
 */
$auth = new \Phalcon\Mvc\Router\Group(array(
	'namespace' => 'App\Controller',
	'controller' => 'auth' 
));
$auth->setPrefix('/auth');
$auth->add('(/?)', array(
	'action' => 'index' 
));
$auth->add('/testmail', array(
		'action' => 'testmail'
));
$auth->add('/register', array(
	'action' => 'register' 
));
$auth->add('/success', array(
	'action' => 'success' 
));
$auth->add('/activate/([a-zA-z0-9-_]+)', array(
	'action' => 'activate',
	'token' => 1 
));
$auth->add('/login', array(
	'action' => 'login' 
));
$auth->add('/logout', array(
	'action' => 'logout' 
));
$auth->add('/forgot', array(
	'action' => 'forgot' 
));
$auth->add('/forgot/success', array(
	'action' => 'forgotSuccess' 
));
$auth->add('/reset', array(
	'action' => 'reset' 
));
$auth->add('/reset/success', array(
		'action' => 'resetSuccess'
));
$router->mount($auth);

/*
 * Profile
 */
$profile = new \Phalcon\Mvc\Router\Group(array(
	'namespace' => 'App\Controller',
	'controller' => 'profile' 
));
$profile->setPrefix('/profile');
$profile->add('(/?)', array(
	'action' => 'index' 
));
$profile->add('/id-([a-zA-z0-9_-]+)/?', array(
	'action' => 'id',
	'id' => 1 
));
$router->mount($profile);

/*
 * Settings
 */
$settings = new \Phalcon\Mvc\Router\Group(array(
	'namespace' => 'App\Controller',
	'controller' => 'settings' 
));
$settings->setPrefix('/settings');
$settings->add('(/?)', array(
	'action' => 'index' 
));
$settings->add('/profile', array(
	'action' => 'profile' 
));
$settings->add('/account', array(
	'action' => 'account' 
));
$settings->add('/password', array(
	'action' => 'password' 
));
$router->mount($settings);

/*
 * Homework
 */
$homework = new \Phalcon\Mvc\Router\Group(array(
	'namespace' => 'App\Controller',
	'controller' => 'homework' 
));
$homework->setPrefix('/homework');
$homework->add('(/?)', array(
	'action' => 'index' 
));
$router->mount($homework);

/*
 * News
 */
$news = new \Phalcon\Mvc\Router\Group(array(
	'namespace' => 'App\Controller',
	'controller' => 'news' 
));
$news->setPrefix('/news');
$news->add('(/?)', array(
	'action' => 'index' 
));
$router->mount($news);

/*
 * Global Routing
 */
$router->add("/", array(
	'namespace' => 'App\Controller',
	'controller' => 'index',
	'action' => 'welcome' 
));

$router->notFound(array(
	'namespace' => 'App\Controller',
	"controller" => "index",
	"action" => "route404" 
));
