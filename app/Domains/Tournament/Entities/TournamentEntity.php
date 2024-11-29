<?php

namespace App\Domains\Tournament\Entities;

class TournamentEntity
{
    private int $id;
    private int $prizeFund;
    private int $disciplineId;
    private int $userId;
    private string $eventDate;
    private string $name;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $value): void
    {
        $this->id = $value;
    }

    public function getPrizeFund(): int
    {
        return $this->prizeFund;
    }

    public function setPrizeFund(int $value): void
    {
        $this->prizeFund = $value;
    }

    public function getDisciplineId(): int
    {
        return $this->disciplineId;
    }

    public function setDisciplineId(int $value): void
    {
        $this->disciplineId = $value;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $value): void
    {
        $this->userId = $value;
    }

    public function getEventDate(): string
    {
        return $this->eventDate;
    }

    public function setEventDate(string $value): void
    {
        $this->eventDate = $value;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $value): void
    {
        $this->name = $value;
    }
}