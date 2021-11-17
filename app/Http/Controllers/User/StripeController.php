<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class StripeController extends Controller
{
    //
    public function stripeOrder(Request $request)
    {
        if (Session::has('coupon')) {
            $total_amount = Session::get('coupon')['total_amount'];

        } else {
            $total_amount = round(Cart::total());

        }

        \Stripe\Stripe::setApiKey('sk_test_51Jk1btHwu7py4kAf8jSGU5b86U0YErWwFsTef7yXszSEebMGnzHp3mlcYfmUToIvZiVHkRfP9M9WlWnubX87MDmj000muwYs1W');

        $token = $_POST['stripeToken'];
        $charge = \Stripe\Charge::create([
            'amount' => $total_amount,
            'currency' => 'usd',
            'description' => 'Online Store',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);

// NOTE:  IMPORTANT   use    dd($charge) to know how to access fields that is accessed via $charge;
        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_id' => $request->state_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'post_code' => $request->post_code,
            'notes' => $request->notes,

            'payment_method' => 'Stripe',
            'payment_type' => 'Stripe',
            'payment_type' => $charge->payment_method,
            'transaction_id' => $charge->balance_transaction,
            'currency' => $charge->currency,
            'amount' => $total_amount,
            'order_number' => $charge->metadata->order_id,
            'invoice_no' => 'OES' . mt_rand(1000000, 99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'pending',
            'created_at' => Carbon::now(),
        ]);

//        data needed for email sent after payment:
        $order = Order::findOrFail($order_id);
        $invoice = $order->invoice_no;

        $data = [
            'invoice_no' => $invoice,
            'amount' => $total_amount,
            'name' => $request->name,
            'email' => $request->email,
        ];

        Mail::to($request->email)->send(new OrderMail($data));

        $carts = Cart::content();
        foreach ($carts as $cart) {

            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cart->id,
                'size' => $cart->options->size,
                'color' => $cart->options->color,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' => Carbon::now(),
            ]);

        }

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        Cart::destroy();
        $notification = array(
            'message' => 'Your Order Placed Successfully',
            'type' => 'success',
        );
        return redirect()->route('dashboard')->with($notification);

    }
}
