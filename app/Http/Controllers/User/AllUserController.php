<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AllUserController extends Controller
{
    //
    public function myOrders()
    {
        $orders = Order::where('user_id', Auth::id())->orderBy('created_at', 'DESC')->get();
        return view('frontend.user.orders.order_view', compact('orders'));

    }

    public function orderDetails($order_id)
    {
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderItems = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('frontend.user.orders.order_details', compact('order', 'orderItems'));


    }

    public function invoiceDownload($order_id)
    {
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderItems = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
//        return view('frontend.user.orders.order_invoice', compact('order', 'orderItems'));

        $pdf = PDF::loadView('frontend.user.orders.order_invoice', compact('order', 'orderItems'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');


    }

    public function returnOrder(Request $request, $order_id)
    {
        $order = Order::findOrFail($order_id)->update([
            'return_reason' => $request->return_reason,
            'return_date' => Carbon::now()->format('j-F-Y'),
            'return_order' => 1,

        ]);

        $notification = array(
            'message' => 'Your Return Request is submitted Successfully',
            'type' => 'success',
        );
        return redirect()->route('my.orders')->with($notification);


    }

    public function returnOrderList()
    {
        $orders = Order::where('user_id', Auth::id())->where('return_reason', '!=', null)->orderBy('created_at', 'DESC')->get();
        return view('frontend.user.orders.return_order_view', compact('orders'));


    }

    public function cancelledOrdersList()
    {
        $orders = Order::where('user_id', Auth::id())->where('status', 'cancelled')->orderBy('id', 'DESC')->get();
        return view('frontend.user.orders.cancelled_order_view', compact('orders'));

    }

//    Order Tracking

    public function order_tracking(Request $request)
    {
        $invoice = $request->code;

        $track = Order::where('invoice_no', $invoice)->first();
         $orderItems= OrderItem::where('order_id', $track->id)->get();



//        $track is the order


        if ($track) {
            return view('frontend.track.track_order_view', compact('track', 'orderItems'));

        } else {
            $notification = array(
                'message' => 'Invalid Invoice No!',
                'type' => 'error',

            );
            return redirect()->back()->with($notification);

        }
    }
}
