<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductToCartRequest;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Http\Resources\CartResource;
use App\HttpResponse;
use App\Models\Cart;
use App\Models\Product;
use App\Services\CartServices;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class CartController extends Controller implements HasMiddleware
{
    use HttpResponse;
    public static function middleware()
    {
        return [
            new Middleware("role:customer"),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function activeCart()
    {
        try {
            return $this->success([
                'Cart' => new CartResource(Cart::firstOrCreate([
                    'user_id' => Auth::user()->id,
                    'status' => 'active',
                ])),
            ]);
        } catch (\Throwable $th) {
            return $this->error('Your cart is empty');
        }
    }

    public function AddProduct(AddProductToCartRequest $request)
    {
        try {
            $cartServices = new CartServices();
            $cart = $cartServices->AddProductToCart($request);
            $cart->total_amount = $cartServices->CalculatingTotalAmount($cart);
            $cart->save();
            return $this->success([
                "cart"=>new CartResource($cart),
            ],'Product added to cart successfully');
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    public function update(UpdateCartRequest $request,CartServices $cartServices)
    {
        try {
            return DB::transaction(function() use ($request, $cartServices) {
                $cart = $cartServices->UpdateProductsInCart($request);
                $cart->total_amount = $cartServices->CalculatingTotalAmount($cart);
                $cart->save();
                return $this->success([
                    "cart"=>new CartResource($cart),
                ],'Cart updated successfully');
            });
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    public function deletingProductFromCart($product_id,CartServices $cartServices)
    {
        try {
            return DB::transaction(function() use ($product_id, $cartServices) {
                $cart = Cart::firstOrCreate([
                    'user_id' => Auth::user()->id,
                    'status' => 'active',
                ]);
                $cart->products()->detach($product_id);
                $cart->total_amount = $cartServices->CalculatingTotalAmount($cart);
                $cart->save();
                return $this->success(
                    ["cart"=>new CartResource($cart)]
                    , 'Product removed from cart successfully');
            });
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }
    public function destroy()
    {
        try {
            $cart = Cart::where('user_id', Auth::user()->id)->first()->delete();
            return $this->success(null, 'Cart deleted successfully');
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }
}
