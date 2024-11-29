<?php

namespace App\Domains\Tournament\UseCases;

use App\Domains\Tournament\Interfaces\TournamentRepositoryInterface;

class GetTournamentsList
{
    public function __construct(
        private TournamentRepositoryInterface $tournamentRepository
    ){}

    public function __invoke(): array
    {
        return $this->tournamentRepository->getList();
    }
}