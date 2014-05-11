<?php
error_reporting(E_ALL);

try{
	
	/**
	 * Read services
	 */
	include __DIR__ . "/../app/config/services.php";
	
	/**
	 * Read auto-loader
	 */
	include __DIR__ . "/../app/config/loader.php";
	
	/**
	 * Handle the request
	 */
	$application = new \Phalcon\Mvc\Application();
	$application->setDI($di);
	echo $application->handle()->getContent();
}catch(Phalcon\Exception $e){
	echo $e->getMessage();
}catch(PDOException $e){
	echo $e->getMessage();
}