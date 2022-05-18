<?php

namespace Tests;

use DI\ContainerBuilder;
use Main\Infrastructure\Config\Middlewares;
use PHPUnit\Framework\TestCase as PHPUnit_TestCase;
use Prophecy\PhpUnit\ProphecyTrait;
use Slim\App;
use Slim\Factory\AppFactory;


class TestCase extends PHPUnit_TestCase
{
    use ProphecyTrait;

    protected function getAppInstance(): App
    {
        $containerBuilder = new ContainerBuilder();

        $dependencies = require __DIR__ . '/../src/Infrastructure/Config/container.php';
        $dependencies($containerBuilder);

        $container = $containerBuilder->build();

        AppFactory::setContainer($container);
        $app = AppFactory::create();

        $app->addBodyParsingMiddleware();
        $app->add(fn($request, $handler) => Middlewares::jsonHeaderResponse($request, $handler));

        $routes = require __DIR__ . '/../src/Application/routes.php';

        $routes($app);

        return $app;

    }
}