<?php

namespace App\Http\Resources\Tournament;

use Illuminate\Http\Resources\Json\ResourceCollection;

class GetTournamentsListResource extends ResourceCollection
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
            function($tournament) {
                $tournament['discipline']['icon_path'] = url($tournament['discipline']['icon_path']);

                return $tournament;
            },
            $newCollection['data']
        );

        return $newCollection;
    }
}
