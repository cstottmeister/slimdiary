<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim();

/** CONFIG **/
// Set the current mode
$app = new \Slim\Slim(array(
    'mode' => 'development'
));

// Only invoked if mode is "production"
$app->configureMode('production', function () use ($app) {
    $app->config(array(
        'log.enable' => true,
        'debug' => false
    ));
});

// Only invoked if mode is "development"
$app->configureMode('development', function () use ($app) {
    $app->config(array(
        'log.enable' => false,
        'debug' => true
    ));
});

/** ROUTES **/
$app->get('/config/:name', function ($name) use ($app) {
	echo "Configuration value for $name:";
	echo $app->config($name);
});


$app->run(); 
?>
