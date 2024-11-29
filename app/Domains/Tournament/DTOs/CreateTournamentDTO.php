<?php

namespace App\Domains\Tournament\DTOs;

class CreateTournamentDTO
{
    public function __construct(
        private int $userId,
        private string $name,
        private int $prizeFund,
        private int $disciplineId,
        private string $eventDate
    ){}

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrizeFund(): int
    {
        return $this->prizeFund;
    }

    public function getDisciplineId(): int
    {
        return $this->disciplineId;
    }

    public function getEventDate(): string
    {
        return $this->eventDate;
    }
}