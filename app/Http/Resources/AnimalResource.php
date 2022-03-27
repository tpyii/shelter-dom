<?php

namespace App\Http\Resources;

use App\Models\Breed;
use App\Models\Type;
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
            'type' => Type::find($this->type_id)->name,
            'breed' => Breed::find($this->breed_id)->name,
            'name' => $this->name,
            'description' => $this->description,
            'treatment_of_parasites' => $this->treatment_of_parasites,
            'birthday_at' => $this->birthday_at,
            'images' => ImagesResource::collection($this->images),
            'disease' => DiseaseResource::collection($this->disease),
            'inoculation' => InoculationResource::collection($this->inoculation),
        ];
    }
}
