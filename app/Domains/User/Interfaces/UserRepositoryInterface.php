<?php

namespace App\Domains\User\Interfaces;

use App\Domains\User\Entities\UserEntity;

interface UserRepositoryInterface 
{
    public function create(UserEntity $entity): int;
}