<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Seller Name'=>$this->owner->name,
            'Name'=>$this->name,
            'Price'=>$this->price,
            'Quantity'=>$this->quantity,
            'Description'=>$this->description,
            'Status'=>$this->status,
            // 'Categories'=>CategoryResource::collection($this->categories())
        ];
    }
}
