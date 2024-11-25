<?php

namespace App\Http\Controllers;

use App\Domains\Tournament\Repositories\TournamentRepository;
use App\Domains\Tournament\UseCases\GetTournamentsList;
use App\Http\Resources\Tournament\GetTournamentsListResource;

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
}
