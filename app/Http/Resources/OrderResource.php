<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'Buyer' => $this->user->name,
            'Order Number' => $this->order_number,
            'Status' => $this->status,
            'Total Amount' => $this->total_amount,
        ];
    }
}
