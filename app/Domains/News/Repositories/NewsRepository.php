<?php

namespace App\Domains\News\Repositories;

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
        ])->paginate(10)
        ->toArray();

        return $news;
    }
}