<?php

namespace App\Domains\User\Entities;

class UserEntity
{
    private int $id;
    private string $name;
    private string $email;
    private string $password;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $value): void
    {
        $this->id = $value;
    }

    public function getName(): string
    {
        return $this->name;
    }
    
    public function setName(string $value): void
    {
        $this->name = $value;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
    
    public function setEmail(string $value): void
    {
        $this->email = $value;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
    
    public function setPassword(string $value): void
    {
        $this->password = $value;
    }
}