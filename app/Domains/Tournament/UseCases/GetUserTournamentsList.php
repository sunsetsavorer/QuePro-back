<?php

namespace App\Domains\Tournament\UseCases;

use App\Domains\Tournament\Interfaces\TournamentRepositoryInterface;

class GetUserTournamentsList
{
    public function __construct(
        private TournamentRepositoryInterface $tournamentRepository
    ){}

    public function __invoke(int $userId): array
    {
        return $this->tournamentRepository->getByUserId($userId);
    }
}