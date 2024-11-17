<?php

namespace App\Domains\User\Repositories;

use App\Models\User;
use App\Domains\User\Exceptions\NoSuchUserException;
use App\Domains\User\Interfaces\AuthTokenRepositoryInterface;

class AuthTokenRepository implements AuthTokenRepositoryInterface
{
    public function createByUserId(int $userId): string
    {
        $user = User::find($userId);

        if(!$user)
            throw new NoSuchUserException();

        $token = $user->createToken('AuthToken')->plainTextToken;

        return $token;
    }
}