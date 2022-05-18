<?php

namespace Main\Application\Controllers;


use Main\Domain\IUserService;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class UserController
{
    private IUserService $userRepository;

    public function __construct(IUserService $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function findAll(Request $request, Response $response): Response
    {
        $users = $this->userRepository->findAll();
        $response->getBody()->write(json_encode($users));
        return $response;
    }

    public function findUserById(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $user = $this->userRepository->findOneById($id);
        $response->getBody()->write(json_encode($user));
        return $response;
    }


    public function createUser(Request $request, Response $response)
    {

        $user = $request->getParsedBody();
        $this->userRepository->add($user);
        $response->getBody()->write(json_encode(["Success" => "User saved successfully"]));
        return $response;
    }


    public function deleteUserById(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $this->userRepository->delete($id);
        $response->getBody()->write(json_encode(["Success" => "User deleted successfully"]));
        return $response;

    }
}