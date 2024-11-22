<?php

namespace App\Domains\User\UseCases;

use App\Domains\Common\Exceptions\ServiceException;
use App\Domains\User\Exceptions\NoSuchUserException;
use App\Domains\User\Interfaces\UserRepositoryInterface;

class GetUser
{
    public function __construct(
        private UserRepositoryInterface $userRepository
    ){}

    public function __invoke(): array
    {
        try {
            $userEntity = $this->userRepository->getById(
                auth()->user()->id
            );

            return [
                'name' => $userEntity->getName(),
                'email' => $userEntity->getEmail(),
            ];

        } catch (NoSuchUserException $e) {
            throw new ServiceException('Не удалось найти такого пользователя', 404);
        }
    }
}