<?php
$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */

// $loader->registerDirs(array(
// $di->get('config')->application->controllersDir,
// $di->get('config')->application->modelsDir,
// $di->get('config')->application->libraryDir
// ))->register();

$loader->registerNamespaces(array(
	"App\Controller" => $di->get('config')->application->controllersDir,
	"App\Model" => $di->get('config')->application->modelsDir,
	"App\Library" => $di->get('config')->application->libraryDir,
	"App\Forms" => $di->get('config')->application->formsDir
))->register();