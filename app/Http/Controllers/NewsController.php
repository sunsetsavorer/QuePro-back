<?php

namespace App\Http\Controllers;

use App\Domains\News\Repositories\NewsRepository;
use App\Domains\News\UseCases\GetNewsList;
use App\Http\Resources\News\GetNewsListResource;

class NewsController extends Controller
{
    public function getList(): GetNewsListResource
    {
        $useCase = new GetNewsList(
            new NewsRepository()
        );

        $result = $useCase();

        return new GetNewsListResource($result);
    }
}
