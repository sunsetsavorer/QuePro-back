<?php

namespace App\Domains\News\UseCases;

use App\Domains\Common\Exceptions\NotFoundException;
use App\Domains\Common\Exceptions\ServiceException;
use App\Domains\News\Interfaces\NewsRepositoryInterface;

class GetNewsBySlug
{
    public function __construct(
        private NewsRepositoryInterface $newsRepository
    ){}

    public function __invoke(string $slug): array
    {
        try {
            return $this->newsRepository->getBySlug($slug);
        } catch (NotFoundException $e) {
            throw new ServiceException('Не удалось найти запись', 404);
        }
    }
}