<?php

namespace App\Domains\User\Interfaces;

use App\Domains\User\Entities\UserEntity;

interface UserRepositoryInterface 
{
    public function create(UserEntity $entity): int;
    public function getById(int $id): UserEntity;
    public function update(UserEntity $entity): array;
}