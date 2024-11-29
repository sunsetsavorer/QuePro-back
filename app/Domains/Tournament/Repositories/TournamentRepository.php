<?php

namespace App\Domains\Tournament\Repositories;

use App\Domains\Tournament\Interfaces\TournamentRepositoryInterface;
use App\Models\Tournament;
use App\Models\TournamentDiscipline;

class TournamentRepository implements TournamentRepositoryInterface
{
    public function getList(): array
    {
        $tournaments = Tournament::select([
            'name',
            'prize_fund',
            'event_date',
            'tournament_discipline_id',
        ])->with('discipline')
        ->paginate(10)
        ->toArray();

        return $tournaments;
    }

    public function getByUserId(int $userId): array
    {
        $tournaments = Tournament::select([
            'name',
            'prize_fund',
            'event_date',
            'tournament_discipline_id',
        ])->where('user_id', $userId)
        ->with('discipline')
        ->paginate(10)
        ->toArray();

        return $tournaments;
    }

    public function getDisciplines(): array
    {
        $disciplines = TournamentDiscipline::select([
            'id',
            'name'
        ])->get()
        ->toArray();

        return $disciplines;
    }
}