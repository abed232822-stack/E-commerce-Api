<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'total_amount', 
        'status',
        'order_number'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function products(){
        return $this->belongsToMany(Product::class,'order_items')->withPivot('quantity','price_per_unit');
    }
}
