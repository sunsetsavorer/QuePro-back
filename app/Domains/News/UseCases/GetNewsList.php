<?php

namespace App\Domains\News\UseCases;

use App\Domains\News\Interfaces\NewsRepositoryInterface;

class GetNewsList
{
    public function __construct(
        private NewsRepositoryInterface $newsRepository
    ){}

    public function __invoke(): array
    {
        return $this->newsRepository->getList();
    }
}