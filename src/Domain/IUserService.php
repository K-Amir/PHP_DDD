<?php

namespace Main\Domain;

interface IUserService
{
    public function findAll();
    public function findOneById(string $id);
    public function add(array $user);
    public function delete(string $id);

}