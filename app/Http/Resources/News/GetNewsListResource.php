<?php

namespace App\Http\Resources\News;

use Illuminate\Http\Resources\Json\ResourceCollection;

class GetNewsListResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $newCollection = $this->collection->toArray();

        $newCollection['data'] = array_map(
            function($news)
            {
                $news['picture_path'] = url($news['picture_path']);

                return $news;
            },
            $newCollection['data']
        );

        return $newCollection;
    }
}
