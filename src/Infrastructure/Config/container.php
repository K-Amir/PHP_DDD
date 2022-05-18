<?php

use Main\Domain\IUserService;
use Main\Infrastructure\Config\MongoDbConfiguration;
use Main\Infrastructure\UserService;
use Psr\Container\ContainerInterface;
use Slim\App;
use Slim\Factory\AppFactory;

return [
    App::class => function (ContainerInterface $container) {
        AppFactory::setContainer($container);
        return AppFactory::create();
    },
    MongoDbConfiguration::class => DI\create(MongoDbConfiguration::class),

    IUserService::class => DI\create(UserService::class)
        ->constructor(DI\get(MongoDbConfiguration::class)),


];