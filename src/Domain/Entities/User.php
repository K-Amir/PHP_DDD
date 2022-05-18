<?php

namespace Main\Domain\Entities;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/** @ODM\Document */
class User
{
    /** @ODM\Id */
    public $id;

    /** @ODM\Field(type="string") */
    public string $name;

    /** @ODM\Field(type="string") */
    public string $email;

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }


}