<?php

namespace App\Http\Controllers;

use App\Models\Order;
//use http\Env\Response;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StripeController extends Controller
{
    public function index(Request $request)
    {

        return view('checkout-form');
    }


    public function checkout(Request $request)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $student=Student::where('card_no', $request->input('card_no'))->firstOrFail();

        $lineItems[] = [
            'price_data' => [
                'currency' => 'aed',
                'product_data' => [
                    'name' => $student->student_name,
//                    'images' => [$product->image]
                ],
                'unit_amount' => $request->input('amount') * 10,
            ],
            'quantity' => 1,
        ];

        $session = \Stripe\Checkout\Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'client_reference_id' => $student->card_no,
            'success_url' => route('checkout.success', [], true) . "?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('checkout.cancel', [], true),
        ]);

//        $order = new Order;
//        $order->plan_id = $plan_id;
//        $order->user_id = Auth::id();
//        $order->getway_id = $gateway->id;
//        $order->trx = $trx;
//        $order->tax = $tax_amount;
//        $order->price = $plan->price;
//        $order->status = $status;
//        $order->payment_status = $payment_status;
//        $order->will_expire = Carbon::now()->addDays($plan->duration);
//        $order->save();


//        $order = new Order();
//        $order->status = 'unpaid';
//        $order->total_price = $totalPrice;
//        $order->session_id = $session->id;
//        $order->save();

        return redirect($session->url);
    }

    public function success(Request $request)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $sessionId = $request->get('session_id');

        $session = \Stripe\Checkout\Session::retrieve($sessionId);
        $amount = $session->amount_total;

            $card_no = $session->client_reference_id;

            $student = Student::where('card_no', $card_no)->first();
            $balance= $student->balance;
            $new_balance = $balance + $amount;

            $student->balance = $new_balance;
            $student->save();

//        try {
//            $session = \Stripe\Checkout\Session::retrieve($sessionId);
//            if (!$session) {
//                throw new NotFoundHttpException;
//            }
//            $customer = \Stripe\Customer::retrieve($session->customer);
//
//            $order = Order::where('session_id', $session->id)->first();
//            if (!$order) {
//                throw new NotFoundHttpException();
//            }
//            if ($order->status === 'unpaid') {
//                $order->status = 'paid';
//                $order->save();
//            }
//
//            return view('checkout-success', compact('customer'));
//        } catch (\Exception $e) {
//            throw new NotFoundHttpException();
//        }

        return view('checkout-success');

    }

    public function cancel()
    {

    }

    public function webhook()
    {
        // This is your Stripe CLI webhook secret for testing your endpoint locally.
        $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload, $sig_header, $endpoint_secret
            );
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            return response('', 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            return response('', 400);
        }

        // Handle the event
        switch ($event->type) {
            case 'checkout.session.completed':
                $session = $event->data->object;

//                $order = Order::where('session_id', $session->id)->first();
//                if ($order && $order->status === 'unpaid') {
//                    $order->status = 'paid';
//                    $order->save();
//                    // Send email to customer
//                }

            // ... handle other event types
            default:
                echo 'Received unknown event type ' . $event->type;
        }

        return response('');
    }
}