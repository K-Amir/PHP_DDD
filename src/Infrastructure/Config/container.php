<?php

use Main\Domain\IUserRepository;
use Main\Infrastructure\Config\MongoDbConfiguration;
use Main\Infrastructure\UserRepository;
use Psr\Container\ContainerInterface;
use Slim\App;
use Slim\Factory\AppFactory;

return [
    App::class => function (ContainerInterface $container) {
        AppFactory::setContainer($container);
        return AppFactory::create();
    },
    MongoDbConfiguration::class => DI\create(MongoDbConfiguration::class),

    IUserRepository::class => DI\create(UserRepository::class)
        ->constructor(DI\get(MongoDbConfiguration::class)),


];