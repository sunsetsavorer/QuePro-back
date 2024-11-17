<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\RegisterUserRequest;
use App\Http\Resources\User\RegisterUserResource;
use App\Domains\User\DTOs\RegisterUserDTO;
use App\Domains\User\Repositories\AuthTokenRepository;
use App\Domains\User\Repositories\UserRepository;
use App\Domains\User\UseCases\RegisterUser;

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
}
