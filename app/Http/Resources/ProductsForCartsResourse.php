<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductsForCartsResourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'Seller Name'=>$this->owner->name,
            'Name'=>$this->name,
            'Price'=>$this->price,
            'Quantity'=>$this->quantity,
            'Description'=>$this->description,
            'Status'=>$this->status,
            'Quantity in Cart'=>$this->pivot->quantity,
        ];
    }
}
