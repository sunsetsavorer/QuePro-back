<?php

namespace App\Http\Controllers;

use App\Domains\Tournament\Repositories\TournamentRepository;
use App\Domains\Tournament\UseCases\GetTournamentsList;
use App\Domains\Tournament\UseCases\GetUserTournamentsList;
use App\Http\Resources\Tournament\GetTournamentsListResource;
use App\Http\Resources\Tournament\GetUserTournamentsListResource;

class TournamentController extends Controller
{
    public function getList(): GetTournamentsListResource
    {
        $useCase = new GetTournamentsList(
            new TournamentRepository()
        );

        $result = $useCase();

        return new GetTournamentsListResource($result);
    }

    public function getUserList(): GetUserTournamentsListResource
    {
        $useCase = new GetUserTournamentsList(
            new TournamentRepository()
        );

        $result = $useCase(
            auth()->user()->id
        );

        return new GetUserTournamentsListResource($result);
    }
}
