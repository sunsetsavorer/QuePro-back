<?php

namespace App\Domains\Tournament\Repositories;

use App\Domains\Tournament\Interfaces\TournamentRepositoryInterface;
use App\Models\Tournament;

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
}