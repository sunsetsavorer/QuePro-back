<?php

namespace App\Domains\User\UseCases;

use App\Domains\Common\Exceptions\ServiceException;
use App\Domains\User\DTOs\RegisterUserDTO;
use App\Domains\User\Entities\UserEntity;
use App\Domains\User\Exceptions\NoSuchUserException;
use App\Domains\User\Interfaces\AuthTokenRepositoryInterface;
use App\Domains\User\Interfaces\UserRepositoryInterface;

class RegisterUser
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private AuthTokenRepositoryInterface $authTokenRepository
    ){}

    public function __invoke(RegisterUserDTO $dto): array
    {
        try {
            $userEntity = new UserEntity();

            $userEntity->setName($dto->getName());
            $userEntity->setEmail($dto->getEmail());
            $userEntity->setPassword($dto->getPassword());

            $userId = $this->userRepository->create($userEntity);

            $token = $this->authTokenRepository->createByUserId($userId);

            return [
                'token' => $token,
            ];

        } catch (NoSuchUserException $e) {
            throw new ServiceException('Ошибка при создании пользователя', 400);
        }
    }
}