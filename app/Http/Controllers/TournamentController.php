<?php

namespace App\Http\Controllers;

use App\Domains\Tournament\DTOs\CreateParticipationEntryDTO;
use App\Domains\Tournament\DTOs\CreateTournamentDTO;
use App\Domains\Tournament\Repositories\TournamentRepository;
use App\Domains\Tournament\UseCases\CreateParticipationEntry;
use App\Domains\Tournament\UseCases\CreateTournament;
use App\Domains\Tournament\UseCases\GetTournamentDisciplines;
use App\Domains\Tournament\UseCases\GetTournamentsList;
use App\Domains\Tournament\UseCases\GetUserTournamentsList;
use App\Http\Requests\Tournament\CreateParticipationEntryRequest;
use App\Http\Requests\Tournament\CreateTournamentRequest;
use App\Http\Resources\Tournament\CreateParticipationEntryResource;
use App\Http\Resources\Tournament\CreateTournamentResource;
use App\Http\Resources\Tournament\GetTournamentDisciplinesListResource;
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

    public function getDisciplines(): GetTournamentDisciplinesListResource
    {
        $useCase = new GetTournamentDisciplines(
            new TournamentRepository()
        );

        $result = $useCase();

        return new GetTournamentDisciplinesListResource($result);
    }

    public function create(CreateTournamentRequest $request): CreateTournamentResource
    {
        $data = $request->validated();

        $useCase = new CreateTournament(
            new TournamentRepository()
        );

        $result = $useCase(
            new CreateTournamentDTO(
                auth()->user()->id,
                $data['name'],
                $data['prize_fund'],
                $data['discipline_id'],
                $data['event_date']
            )
        );

        return new CreateTournamentResource($result);
    }

    public function createParticipationEntry(CreateParticipationEntryRequest $request): CreateParticipationEntryResource
    {
        $data = $request->validated();

        $useCase = new CreateParticipationEntry(
            new TournamentRepository()
        );

        $useCase(
            new CreateParticipationEntryDTO(
                $data['tournament_id'],
                $data['team_name'],
                $data['captain_fullname'],
                $data['captain_phone'],
                $data['captain_email']
            )
        );

        return new CreateParticipationEntryResource([]);
    }
}
