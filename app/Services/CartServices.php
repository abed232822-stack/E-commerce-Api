<?php

namespace App\Services;

use App\HttpResponse;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartServices
{
    use HttpResponse;
    public function AddProductToCart($request){
        return DB::transaction(function() use($request){
                $product = Product::find($request->product_id);
            $cart = Cart::firstOrCreate([
                'user_id' => Auth::user()->id,
                'status' => 'active',
            ]);
            if ($cart->products()->where('product_id', $request->product_id)->exists()) {
                if ($cart->products()->where('product_id', $request->product_id)->first()->pivot->quantity + $request->quantity > $product->quantity) {
                    return $this->error('Not enough quantity in stock');
                }
                $cart->products()->updateExistingPivot($request->product_id, [
                    'quantity' => $cart->products()->where('product_id', $request->product_id)->first()->pivot->quantity + $request->quantity,
                ]);
            } else {
                $cart->products()->attach($request->product_id, [
                    'quantity' => $request->quantity,
                    'price_per_unit' => $product->price,
                ]);
            }
            return $cart;
        });
    }
    public function UpdateProductsInCart($request){
        return DB::transaction(function() use($request){
            $cart = Cart::where('user_id', Auth::user()->id)
                    ->first();
                foreach($request->products as $product){
                    $dbProduct=Product::find($product['id']);
                    if ($cart->products()->where('product_id', $product['id'])->exists()) {
                        $cart->products()->updateExistingPivot($product['id'], [
                            'quantity' => $product['quantity'],
                            'price_per_unit'=>$dbProduct->price,
                        ]);
                    } else {
                        $cart->products()->attach($product['id'], [
                            'quantity' => $product['quantity'],
                            'price_per_unit'=>$dbProduct->price,
                        ]);
                    }
                }
            return $cart;
        });
    }
    public function CalculatingTotalAmount($cart){
        return $cart->products()->sum(DB::raw('cart_items.quantity * cart_items.price_per_unit'));
    }
}
