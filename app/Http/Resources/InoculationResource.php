<?php

namespace App\Http\Resources;

use App\Models\Inoculation;
use Illuminate\Http\Resources\Json\JsonResource;

class InoculationResource extends JsonResource
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
            'id' => $this->inoculation_id,
            'name' => Inoculation::find($this->inoculation_id)->name
        ];
    }
}
