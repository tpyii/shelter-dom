<?php

namespace App\Http\Resources;

use App\Models\Disease;
use Illuminate\Http\Resources\Json\JsonResource;

class DiseaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->disease_id,
            'name' => Disease::find($this->disease_id)->name
        ];
    }
}
