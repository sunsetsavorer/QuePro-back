<?php

namespace App\Http\Controllers;

use App\Domains\News\Repositories\NewsRepository;
use App\Domains\News\UseCases\GetNewsBySlug;
use App\Domains\News\UseCases\GetNewsList;
use App\Http\Requests\News\GetNewsBySlugRequest;
use App\Http\Resources\News\GetNewsBySlugResource;
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

    public function getBySlug(GetNewsBySlugRequest $request): GetNewsBySlugResource
    {
        $data = $request->validated();

        $useCase = new GetNewsBySlug(
            new NewsRepository()
        );

        $result = $useCase($data['slug']);

        return new GetNewsBySlugResource($result);
    }
}
