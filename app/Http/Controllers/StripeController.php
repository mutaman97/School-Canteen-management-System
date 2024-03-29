<?php

namespace App\Http\Controllers;

use App\Models\Order;
//use http\Env\Response;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
                'unit_amount' => round($request->input('amount'), 2) * 100 ,
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
        DB::beginTransaction();

        try {
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            $sessionId = $request->get('session_id');
            $session = \Stripe\Checkout\Session::retrieve($sessionId);

            if (!$session || Order::where('trx_id', $sessionId)->exists()) {
                throw new NotFoundHttpException;
            }

            $charge = round((($session->amount_total /100) - ($session->amount_total * 0.029 /100) - 1),2);
            $card_no = $session->client_reference_id;

            $student = Student::where('card_no', $card_no)->firstOrFail();
            $old_balance= $student->balance;
            $new_balance = round($old_balance + $charge, '2');

            $current_time = now(); // Get the current Unix timestamp

            $order = new Order();
            $order->parent_code = $student->parent_code;
            $order->student_code = $student->student_code;
            $order->card_no = $card_no;
            $order->balance = $charge;
            $order->balance_before = $old_balance;
            $order->balance_after = $new_balance;
            $order->balance_date = $current_time->toDateString();
            $order->balance_time = $current_time->toTimeString();
            $order->user_id = 59;
            $order->trx_id = $session->id;

            // Check if first_payment is null before updating
            if ($student->first_payment === null) {
                $student->update(['balance' => $new_balance, 'first_payment' => now()]);
            }
            else{
                $student->update(['balance' => $new_balance]);
            }

            $student->save();
            $order->save();

            DB::commit();
            // all good
            return view('checkout-success');

        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            throw new NotFoundHttpException();
        }




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


    }

    public function cancel()
    {
        return view('checkout-cancel');
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
