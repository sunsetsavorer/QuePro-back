<?php

namespace App\Domains\Tournament\Entities;

class ParticipationEntryEntity
{
    private int $tournamentId;
    private string $teamName;
    private string $captainFullname;
    private string $captainPhone;
    private string $captainEmail;

    public function getTournamentId(): int
    {
        return $this->tournamentId;
    }

    public function setTournamentId(int $value): void
    {
        $this->tournamentId = $value;
    }

    public function getTeamName(): string
    {
        return $this->teamName;
    }

    public function setTeamName(string $value): void
    {
        $this->teamName = $value;
    }

    public function getCaptainFullname(): string
    {
        return $this->captainFullname;
    }

    public function setCaptainFullname(string $value): void
    {
        $this->captainFullname = $value;
    }

    public function getCaptainPhone(): string
    {
        return $this->captainPhone;
    }

    public function setCaptainPhone(string $value): void
    {
        $this->captainPhone = $value;
    }

    public function getCaptainEmail(): string
    {
        return $this->captainEmail;
    }

    public function setCaptainEmail(string $value): void
    {
        $this->captainEmail = $value;
    }
}