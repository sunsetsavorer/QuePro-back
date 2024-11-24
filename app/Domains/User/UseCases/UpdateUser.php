<?php

namespace App\Domains\User\UseCases;

use App\Domains\Common\Exceptions\ServiceException;
use App\Domains\User\DTOs\UpdateUserDTO;
use App\Domains\User\Entities\UserEntity;
use App\Domains\User\Exceptions\NoSuchUserException;
use App\Domains\User\Interfaces\UserRepositoryInterface;

class UpdateUser
{
    public function __construct(
        private UserRepositoryInterface $userRepository
    ){}

    public function __invoke(UpdateUserDTO $dto): array
    {
        try {
            $userEntity = new UserEntity();

            $userEntity->setId($dto->getId());
            $userEntity->setName($dto->getName());
            $userEntity->setEmail($dto->getEmail());
            $userEntity->setCountry($dto->getCountry());
            $userEntity->setCity($dto->getCity());
            $userEntity->setPhone($dto->getPhone());
            $userEntity->setBio($dto->getBio());

            $user = $this->userRepository->update($userEntity);

            return $user;

        } catch (NoSuchUserException $e) {
            throw new ServiceException('Не удалось найти такого пользователя', 404);
        }
    }
}