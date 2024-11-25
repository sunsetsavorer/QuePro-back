<?php

namespace App\Domains\Tournament\Interfaces;

interface TournamentRepositoryInterface
{
    public function getList(): array;
}