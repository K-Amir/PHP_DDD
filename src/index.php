<?php

require __DIR__ . '/../vendor/autoload.php';

use DI\ContainerBuilder;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response;




use Slim\App;



$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__ . './Infrastructure/Config/container.php');
$container = $containerBuilder->build();
$app =  $container->get(App::class);



// Middlewares
$app->addErrorMiddleware(true,true,true);



require __DIR__ . './Application/routes.php';

$app->run();

