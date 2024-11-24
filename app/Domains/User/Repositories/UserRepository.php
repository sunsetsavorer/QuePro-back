<?php

namespace App\Domains\User\Repositories;

use App\Models\User;
use App\Domains\User\Entities\UserEntity;
use App\Domains\User\Exceptions\NoSuchUserException;
use App\Domains\User\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    public function create(UserEntity $entity): int
    {
        $user = User::create([
            'name' => $entity->getName(),
            'email' => $entity->getEmail(),
            'password' => Hash::make($entity->getPassword()),
        ]);

        return $user->id;
    }

    public function getById(int $id): UserEntity
    {
        $user = User::find($id);

        if(!$user)
            throw new NoSuchUserException();

        $user = $user->toArray();

        $userEntity = new UserEntity();

        $userEntity->setName($user['name']);
        $userEntity->setEmail($user['email']);
        $userEntity->setCountry($user['country']);
        $userEntity->setCity($user['city']);
        $userEntity->setPhone($user['phone']);
        $userEntity->setBio($user['bio']);

        return $userEntity;
    }

    public function update(UserEntity $entity): array
    {
        $user = User::find(
            $entity->getId()
        );

        if(!$user)
            throw new NoSuchUserException();

        $user->update([
            'name' => $entity->getName(),
            'email' => $entity->getEmail(),
            'country' => $entity->getCountry(),
            'city' => $entity->getCity(),
            'bio' => $entity->getBio(),
            'phone' => $entity->getPhone(),
        ]);

        $user = $user->toArray();

        return [
            'name' => $user['name'],
            'email' => $user['email'],
            'country' => $user['country'],
            'city' => $user['city'],
            'phone' => $user['phone'],
            'bio' => $user['bio'],
        ];
    }
}