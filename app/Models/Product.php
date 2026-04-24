<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    protected $table='products';
    protected $fillable = [
        'seller',
        'name',
        'price',
        'quantity',
        'description',
        'status'
    ];
    public function categories(){
        return $this->belongsToMany(Category::class,'category_product','product_id','category_id');
    }
    public function owner(){
        return $this->belongsTo(User::class,'seller');
    }
}
