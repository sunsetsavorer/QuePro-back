<?php

namespace App\Domains\User\Interfaces;

interface AuthTokenRepositoryInterface
{
    public function createByUserId(int $userId): string;
}