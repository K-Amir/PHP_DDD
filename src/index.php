<?php

require __DIR__ . '/../vendor/autoload.php';

use DI\ContainerBuilder;


use Main\Infrastructure\Config\Middlewares;
use Slim\App;


$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__ . './Infrastructure/Config/container.php');
$container = $containerBuilder->build();
$app = $container->get(App::class);


// Middlewares
$app->addErrorMiddleware(true, true, true);
$app->addBodyParsingMiddleware();
$app->add(fn($request, $header) => Middlewares::jsonHeaderResponse($request, $header));


$routes = require __DIR__ . './Application/routes.php';

$routes($app);

$app->run();

