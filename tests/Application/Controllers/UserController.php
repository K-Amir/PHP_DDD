<?php

namespace Tests\Application\Controllers;

use Main\Domain\Entities\User;
use Main\Infrastructure\UserService;
use Tests\TestCase;

class UserController extends TestCase
{
    public function testAction()
    {
        $app  = $this->getAppInstance();

        $container = $app->getContainer();

        $user = new User();
        $user->setEmail("test@test.test");
        $user->setName("test");

        $userServiceMock = $this->prophesize(UserService::class);
        

        $this->assertEquals(true, true);
    }
}