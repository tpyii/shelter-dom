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
            'type' => $this->type->name,
            'breed' => $this->breed->name,
            'name' => $this->name,
            'description' => $this->description,
            'treatment_of_parasites' => $this->treatment_of_parasites,
            'birthday_at' => $this->birthday_at,
            'images' => ImagesResource::collection($this->images),
            'disease' => DiseaseResource::collection($this->disease),
            'inoculation' => InoculationResource::collection($this->inoculation),
            'favourite' => $this->when($request->user(), $this->users->contains($request->user())),
        ];
    }
}
