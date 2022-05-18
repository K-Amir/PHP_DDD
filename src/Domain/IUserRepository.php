<?php

namespace Main\Domain;

interface IUserRepository
{
    public function findAll();
    public function findOneById(string $id);
    public function add(string $hola);
    public function delete(string $id);

}