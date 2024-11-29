<?php

namespace App\Domains\Tournament\Interfaces;

use App\Domains\Tournament\Entities\ParticipationEntryEntity;
use App\Domains\Tournament\Entities\TournamentEntity;

interface TournamentRepositoryInterface
{
    public function getList(): array;
    public function getByUserId(int $userId): array;
    public function getDisciplines(): array;
    public function create(TournamentEntity $entity): array;
    public function createParticipationEntry(ParticipationEntryEntity $entity): void;
}