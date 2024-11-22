<?php

namespace App\Domains\User\Interfaces;

use App\Domains\User\Entities\UserEntity;

interface AuthServiceInterface
{
    public function tryToAuthorize(UserEntity $entity): void;
}