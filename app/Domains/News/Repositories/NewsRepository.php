<?php

namespace App\Domains\News\Repositories;

use App\Domains\Common\Exceptions\NotFoundException;
use App\Domains\News\Interfaces\NewsRepositoryInterface;
use App\Models\News;

class NewsRepository implements NewsRepositoryInterface
{
    public function getList(): array
    {
        $news = News::select([
            'slug',
            'title',
            'publication_date',
            'picture_path',
        ])->orderBy('publication_date', 'desc')
        ->paginate(10)
        ->toArray();

        return $news;
    }

    public function getBySlug(string $slug): array
    {
        $news = News::where('slug', $slug)
            ->first();

        if(!$news)
            throw new NotFoundException();

        return $news->toArray();
    }
}