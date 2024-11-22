<?php

namespace App\Domains\User\UseCases;

use App\Domains\Common\Exceptions\ServiceException;
use App\Domains\User\DTOs\AuthorizeUserDTO;
use App\Domains\User\Entities\UserEntity;
use App\Domains\User\Exceptions\InvalidCredentialsException;
use App\Domains\User\Interfaces\AuthServiceInterface;
use App\Domains\User\Interfaces\AuthTokenRepositoryInterface;

class AuthorizeUser
{
    public function __construct(
        private AuthServiceInterface $authService,
        private AuthTokenRepositoryInterface $authTokenRepository
    ){}

    public function __invoke(AuthorizeUserDTO $dto): array
    {
        try {
            $entity = new UserEntity();

            $entity->setEmail($dto->getEmail());
            $entity->setPassword($dto->getPassword());

            $this->authService->tryToAuthorize($entity);

            $token = $this->authTokenRepository->createByUserId(
                auth()->user()->id
            );

            return [
                'token' => $token
            ];

        } catch (InvalidCredentialsException $e) {
            throw new ServiceException('Неверные данные для входа', 422);
        }
    }
}