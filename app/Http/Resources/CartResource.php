<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Buyer'=>$this->user->name,
            'Quantity'=>$this->products->sum('pivot.quantity'),
            'Status'=>$this->status,
            'Total Amount'=>$this->total_amount,
            'Products'=>ProductsForCartsResourse::collection($this->products),
        ];
    }
}
