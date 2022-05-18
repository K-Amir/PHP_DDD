<?php

namespace Main\Infrastructure\Config;

class Middlewares
{

   static function jsonHeaderResponse($request, $handler){
        $response = $handler->handle($request);
        return $response->withAddedHeader('Content-Type', 'application/json');
    }
}