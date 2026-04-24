<?php

namespace App\Http\Controllers;

use App\HttpResponse;
use App\Models\Order;
use Illuminate\Http\Request;
use Stripe\Webhook;

class PaymentController extends Controller
{
    use HttpResponse;
    public function webhook(Request $request){
        $payload=$request->getContent();
        $sig=$request->header('Stripe-Signature');
        $secret=env('STRIPE_WEBHOOK_SECRET');
        try {
            $event=Webhook::constructEvent($payload,$sig,$secret);

        } catch (\Throwable $th) {
            return $this->error($th->getMessage(),400);
        }
        $intent=$event->data->object;
        switch($event->type){
            case 'payment_intent.succeeded':
                $order=Order::find($intent->metadata->order_id);
                $order->update([
                    'status' => 'paid',
                ]);
                
                return $this->success('Payment succeeded and order updated');
            case 'payment_intent.payment_failed':
                $order=Order::find($intent->metadata->order_id);
                if($order){
                    $order->update([
                        'status' => 'failed',
                    ]);
                }
                return $this->success('Payment failed and order updated');
        }
    }
}
