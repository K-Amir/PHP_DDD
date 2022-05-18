<?php

require __DIR__ . '/../vendor/autoload.php';

use DI\ContainerBuilder;


use Slim\App;



$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__ . './Infrastructure/Config/container.php');
$container = $containerBuilder->build();
$app =  $container->get(App::class);



// Middlewares
$app->addErrorMiddleware(true,true,true);
$app->addBodyParsingMiddleware();


require __DIR__ . './Application/routes.php';

$app->run();

