<?php

namespace App\Domains\User\Entities;

class UserEntity
{
    private int $id;
    private string $name;
    private string $email;
    private string $password;
    private string $city;
    private string $country;
    private string $phone;
    private string $bio;

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

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $value): void
    {
        $this->city = $value;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $value): void
    {
        $this->country = $value;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $value): void
    {
        $this->phone = $value;
    }

    public function getBio(): string
    {
        return $this->bio;
    }

    public function setBio(string $value): void
    {
        $this->bio = $value;
    }
}