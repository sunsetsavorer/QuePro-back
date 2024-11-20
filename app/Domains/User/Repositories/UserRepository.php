<?php

namespace App\Domains\User\Repositories;

use App\Models\User;
use App\Domains\User\Entities\UserEntity;
use App\Domains\User\Exceptions\InvalidCredentialsException;
use App\Domains\User\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
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

    public function tryToAuthorize(UserEntity $entity): void
    {
        $isValidCredentials = Auth::attempt(
            [
                'email' => $entity->getEmail(),
                'password' => $entity->getPassword(),
            ]
        );

        if(!$isValidCredentials)
            throw new InvalidCredentialsException();
    }
}