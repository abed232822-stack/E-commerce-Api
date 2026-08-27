<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderResource;
use App\HttpResponse;
use App\Models\Order;
use App\Models\Product;
use App\Services\OrderServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Stripe\PaymentIntent;
use Stripe\Service\Climate\OrderService;
use Stripe\Stripe;

class OrderController extends Controller
{
    use HttpResponse;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return $this->success(OrderResource::collection(Order::paginate(10)));
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $cart=Auth::user()->carts()->where('status','active')->with('products')->first();
            $data=[];
            if($cart){
            $data['products']=$cart->products->map(function($product){
                    return [
                        'id'=>$product->id,
                        'quantity'=>$product->pivot->quantity,
                    ];
                })->toArray();
            }
            else {
                return $this->error('your cart is empty',400);
            }
            $orderService=new OrderServices();
            $response=$orderService->CreateOrder($data,Auth::user()->id);
            $cart->delete();
            return $this->success($response);

        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
