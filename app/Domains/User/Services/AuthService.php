<?php

namespace App\Domains\User\Services;

use App\Domains\User\Entities\UserEntity;
use App\Domains\User\Exceptions\InvalidCredentialsException;
use App\Domains\User\Interfaces\AuthServiceInterface;
use Illuminate\Support\Facades\Auth;

class AuthService implements AuthServiceInterface
{
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

    public function logout(): void
    {
        request()->user()->currentAccessToken()->delete();
    }
}