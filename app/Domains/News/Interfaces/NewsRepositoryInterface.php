<?php

namespace App\Domains\News\Interfaces;

interface NewsRepositoryInterface
{
    public function getList(): array;
}