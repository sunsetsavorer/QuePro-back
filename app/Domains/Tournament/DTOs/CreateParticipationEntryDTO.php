<?php

namespace App\Domains\Tournament\DTOs;

class CreateParticipationEntryDTO
{
    public function __construct(
        private int $tournamentId,
        private string $teamName,
        private string $captainFullname,
        private string $captainPhone,
        private string $captainEmail
    ){}

    public function getTournamentId(): int
    {
        return $this->tournamentId;
    }

    public function getTeamName(): string
    {
        return $this->teamName;
    }

    public function getCaptainFullname(): string
    {
        return $this->captainFullname;
    }

    public function getCaptainPhone(): string
    {
        return $this->captainPhone;
    }

    public function getCaptainEmail(): string
    {
        return $this->captainEmail;
    }
}