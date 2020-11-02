<?php 
include '../dd.php';
$config = include '../config/config.php';
require '../vendor/autoload.php';

use DI\ContainerBuilder;
use League\Plates\Engine;

$contaonerBuilder = new ContainerBuilder;

$contaonerBuilder->addDefinitions([
	Engine::class => function() {
		return new Engine('../app/views/blog');
	}
]);
$container = $contaonerBuilder->build();
include '../config/routs.php';








