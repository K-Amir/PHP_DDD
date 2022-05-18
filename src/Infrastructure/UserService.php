<?php

namespace Main\Infrastructure;

use Main\Domain\Entities\User;
use Main\Domain\IUserService;
use Main\Infrastructure\Config\MongoDbConfiguration;

class UserService implements IUserService
{
    private $userRepo;
    private $dm;

    public function __construct(MongoDbConfiguration $conf)
    {
        $this->dm = $conf->getDm();

        $this->userRepo = $this->dm->getRepository(User::class);
    }


    public function add(array $user)
    {
        $userToSave = new User();
        $userToSave->setName($user["name"]);
        $userToSave->setEmail($user['email']);
        $this->dm->persist($userToSave);
        $this->dm->flush();
    }

    public function findAll()
    {
        return $this->userRepo->findAll();
    }


    public function delete(string $id)
    {
        $user = $this->findOneById($id);
        if ($user) {
            $this->dm->remove($user);
            $this->dm->flush();
        }

    }

    public function findOneById(string $id)
    {
        $user = $this->userRepo->find($id);
        return $user ?? ["error" => "No user found with the provided id"];
    }
}