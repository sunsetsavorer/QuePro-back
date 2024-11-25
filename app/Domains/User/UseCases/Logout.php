<?php

namespace App\Domains\User\UseCases;

use App\Domains\User\Interfaces\AuthServiceInterface;

class Logout
{
    public function __construct(
        private AuthServiceInterface $authService
    ){}

    public function __invoke(): void
    {
        $this->authService->logout();
    }
}