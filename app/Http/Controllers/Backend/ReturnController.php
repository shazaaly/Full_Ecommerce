<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReturnController extends Controller
{
    //

    public function return_requests()
    {
        $orders = Order::where('return_order', '1')->orderBy('id', 'DESC')->get();
        return view('backend.return.return_requests', compact('orders'));

    }

    public function ApproveRequest($order_id)
    {
//    do not use   return $order= Order::find($order_id) just match id;

        Order::where('id', $order_id)->update(['return_order' => 2]);
        $notification = array(
            'message' => 'Return Request Approved successfully',
            'type' => 'success',

        );
        return redirect()->back()->with($notification);
    }

    public function ApprovedReturn()
    {
        $orders = Order::where('return_order', '2')->orderBy('id', 'DESC')->get();
        return view('backend.return.approved_return', compact('orders'));

    }
}
