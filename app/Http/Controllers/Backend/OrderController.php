<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public function pendingOrders()
    {

        $orders = Order::where('status', 'pending')->orderBy('id', 'DESC')->get();
        return view('backend.orders.pending_orders_view', compact('orders'));
    }

    public function pendingOrderDetails($order_id)
    {

        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->first();
        $orderItems = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('backend.orders.pending_orders_details', compact('order', 'orderItems'));

    }

//    Confirmed:

    public function confirmedOrders()
    {

        $orders = Order::where('status', 'confirmed')->orderBy('id', 'DESC')->get();
        return view('backend.orders.confirmed_orders_view', compact('orders'));
    }

    public function confirmedOrderDetails($order_id)
    {

        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->first();
        $orderItems = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('backend.orders.confirmed_orders_details', compact('order', 'orderItems'));

    }


    public function processingOrders()
    {

        $orders = Order::where('status', 'processing')->orderBy('id', 'DESC')->get();
        return view('backend.orders.processing_orders_view', compact('orders'));
    }

    public function processingOrderDetails($order_id)
    {

        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->first();
        $orderItems = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('backend.orders.processing_orders_details', compact('order', 'orderItems'));

    }

    public function pickedOrders()
    {

        $orders = Order::where('status', 'picked')->orderBy('id', 'DESC')->get();
        return view('backend.orders.picked_orders_view', compact('orders'));
    }

    public function pickedOrderDetails($order_id)
    {

        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->first();
        $orderItems = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('backend.orders.picked_orders_details', compact('order', 'orderItems'));

    }

    public function shippedOrders()
    {

        $orders = Order::where('status', 'shipped')->orderBy('id', 'DESC')->get();
        return view('backend.orders.shipped_orders_view', compact('orders'));
    }

    public function shippedOrderDetails($order_id)
    {

        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->first();
        $orderItems = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('backend.orders.shipped_orders_details', compact('order', 'orderItems'));

    }


    public function deliveredOrders()
    {

        $orders = Order::where('status', 'delivered')->orderBy('id', 'DESC')->get();
        return view('backend.orders.delivered_orders_view', compact('orders'));
    }

    public function deliveredOrderDetails($order_id)
    {

        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->first();
        $orderItems = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('backend.orders.delivered_orders_details', compact('order', 'orderItems'));

    }

    public function cancelledOrders()
    {

        $orders = Order::where('status', 'cancelled')->orderBy('id', 'DESC')->get();
        return view('backend.orders.delivered_orders_view', compact('orders'));
    }

    public function cancelledOrderDetails($order_id)
    {

        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->first();
        $orderItems = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('backend.orders.delivered_orders_details', compact('order', 'orderItems'));

    }

//    change status of order:
    public function confirm($order_id)
    {

        $items = OrderItem::where('order_id', $order_id)->get();
        foreach ($items as $item){
            Product::where('id', $item->product_id)->update([
                'product_qty'=> DB::raw( 'product_qty-'. $item->qty),
            ]);


        }

        $order = Order::findOrFail($order_id)->update([
            'status' => 'confirmed'
        ]);
        $notification = array(
            'message' => 'Order confirmed successfully',
            'type' => 'info',

        );
        return redirect()->back()->with($notification);
    }


    public function process($order_id)
    {
        $order = Order::findOrFail($order_id)->update([
            'status' => 'processing'
        ]);
        $notification = array(
            'message' => 'Order state is in processing',
            'type' => 'info',

        );
        return redirect()->back()->with($notification);
    }


    public function pick($order_id)
    {
        $order = Order::findOrFail($order_id)->update([
            'status' => 'picked'
        ]);
        $notification = array(
            'message' => 'Order is picked',
            'type' => 'info',

        );
        return redirect()->back()->with($notification);
    }

    public function ship($order_id)
    {
        $order = Order::findOrFail($order_id)->update([
            'status' => 'shipped'
        ]);
        $notification = array(
            'message' => 'Order is shipped',
            'type' => 'info',

        );
        return redirect()->back()->with($notification);
    }

    public function deliver($order_id)
    {


        $order = Order::findOrFail($order_id)->update([
            'status' => 'delivered'
        ]);
        $notification = array(
            'message' => 'Order is delivered',
            'type' => 'info',

        );
        return redirect()->back()->with($notification);
    }

    public function cancel($order_id)
    {
        $order = Order::findOrFail($order_id)->update([
            'status' => 'cancelled'
        ]);
        $notification = array(
            'message' => 'Order is cancelled',
            'type' => 'info',

        );
        return redirect()->back()->with($notification);
    }

    public function AdminDownloadInvoice($order_id)
    {
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->first();
        $orderItems = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        $pdf = PDF::loadView('backend.orders.invoice',compact('order','orderItems'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');

    }
}
