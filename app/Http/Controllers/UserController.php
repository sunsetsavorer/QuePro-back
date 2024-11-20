<?php

namespace App\Http\Controllers;

use App\Domains\User\DTOs\AuthorizeUserDTO;
use App\Http\Requests\User\RegisterUserRequest;
use App\Http\Resources\User\RegisterUserResource;
use App\Domains\User\DTOs\RegisterUserDTO;
use App\Domains\User\Repositories\AuthTokenRepository;
use App\Domains\User\Repositories\UserRepository;
use App\Domains\User\UseCases\AuthorizeUser;
use App\Domains\User\UseCases\RegisterUser;
use App\Http\Requests\User\AuthorizeUserRequest;
use App\Http\Resources\User\AuthorizeUserResource;

class UserController extends Controller
{
    public function register(RegisterUserRequest $request): RegisterUserResource
    {
        $data = $request->validated();

        $useCase = new RegisterUser(
            new UserRepository(),
            new AuthTokenRepository()
        );

        $result = $useCase(
            new RegisterUserDTO(
                $data['name'],
                $data['email'],
                $data['password']
            )
        );

        return new RegisterUserResource($result);
    }

    public function login(AuthorizeUserRequest $request): AuthorizeUserResource
    {
        $data = $request->validated();

        $useCase = new AuthorizeUser(
            new UserRepository(),
            new AuthTokenRepository()
        );

        $result = $useCase(
            new AuthorizeUserDTO(
                $data['email'],
                $data['password']
            )
        );

        return new AuthorizeUserResource($result);
    }
}
