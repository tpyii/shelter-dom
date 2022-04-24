<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
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
            'phone' => $this->phone ,
            'name' => $this->name ,
            'surname' => $this->surname ,
            'description' => $this->description ,
            'address' => $this->address ,
            'birthday_at' => $this->birthday_at ,
            'avatar' => $this->avatar ,
        ];
    }
}
