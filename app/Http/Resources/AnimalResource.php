<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AnimalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type_id' => $this->type_id,
            'breed_id' => $this->breed_id,
            'name' => $this->name,
            'description' => $this->description,
            'treatment_of_parasites' => $this->treatment_of_parasites,
            'birthday_at' => $this->birthday_at,
            'images' => $this->images,
            'disease' => AnimalDiseaseResource::collection($this->disease),
            'inoculation' => $this->inoculation,
        ];
    }
}
