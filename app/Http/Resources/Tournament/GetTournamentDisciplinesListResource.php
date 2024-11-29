<?php

namespace App\Http\Resources\Tournament;

use Illuminate\Http\Resources\Json\ResourceCollection;

class GetTournamentDisciplinesListResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->toArray();
    }
}
