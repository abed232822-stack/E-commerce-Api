<?php

namespace App\Services;

use App\Http\Resources\OrderResource;
use App\HttpResponse;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class OrderServices
{
    use HttpResponse;

    public function CreateOrder(array $data, $userId)
    {
        return DB::transaction(function() use ($data,$userId){
            
            $order1 = $data;
            $order1['status'] = 'pending';
            $order1['user_id'] = $userId; 
            $order = Order::create($order1);
            $totalAmount = 0;
            foreach ($data['products'] as $temp) {
                $product = Product::find($temp['id']);
                $totalAmount += $product['price'] * $temp['quantity'];
                $order->products()->attach($product['id'], ['quantity' => $temp['quantity'], 'price_per_unit' => $product['price']]);
                $product->quantity -= $temp['quantity'];
                $product->save();
            }

            $intent = $this->CreateStripeIntent($totalAmount, $order->id);
            $order->update([
                'total_amount' => $totalAmount,
                'payment_intent_id' => $intent->id,
            ]);
    
            return [
                'client_secret' => $intent->client_secret,
                'order_id' => $order->id,
                'order_details' => new OrderResource($order),
            ];
        });
    }

    public function CreateStripeIntent($totalAmount, $orderId)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $intent = PaymentIntent::create([
            'amount' => $totalAmount * 100,
            'currency' => 'usd',
            'metadata' => [
                'order_id' => $orderId,
            ],
            'automatic_payment_methods' => [
                'enabled' => true,
                'allow_redirects' => 'never',
            ],
        ]);
        return $intent;
    }
}
