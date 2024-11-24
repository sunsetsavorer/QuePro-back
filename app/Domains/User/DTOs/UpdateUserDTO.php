<?php

namespace App\Domains\User\DTOs;

class UpdateUserDTO
{
    public function __construct(
        private int $id,
        private string $name,
        private string $email,
        private string $country,
        private string $city,
        private string $phone,
        private string $bio
    ){}

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getBio(): string
    {
        return $this->bio;
    }
}