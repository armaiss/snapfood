<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FoodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'price'=>$this->price,
            'off'=>[
                'lable'=>$this->discount,
                'factor'=>(100-$this->discount)/100,
            ],
            'raw_materials'=>$this->materials,
            'image'=>$this->image,

        ];
    }
}
