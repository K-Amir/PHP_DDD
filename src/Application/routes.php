<?php

use Main\Application\Controllers\UserController;
use Slim\App;

/** @var App $app */
$app->get("/users", [UserController::class, 'findAll']);
$app->get("/users/{id}", [UserController::class, 'findUserById']);
$app->delete("/users/{id}",[UserController::class, 'deleteUserById']);
$app->post("/users", [UserController::class, 'createUser']);
