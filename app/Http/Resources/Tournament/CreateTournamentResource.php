<?php

namespace App\Http\Resources\Tournament;

use Illuminate\Http\Resources\Json\JsonResource;

class CreateTournamentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $this->resource['discipline']['icon_path'] = url($this->resource['discipline']['icon_path']);

        return $this->resource;
    }
}
