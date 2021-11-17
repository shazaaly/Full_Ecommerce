<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use DateTime;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //

    public function all_reports()
    {
        return view('backend.reports.reports_view');

    }

    public function search_by_date(Request $request)
    {
//        return $request->all();    "date": "2021-10-18"
//        db: 18-October-2021  ,  format date: 18-October-2021

        $date = new DateTime($request->date);
        $formatDate = $date->format('d F Y');
        $orders = Order::where('order_date', $formatDate)->latest()->get();
        return view('backend.reports.orders_by_date', compact('orders'));


    }

    public function search_by_month(Request $request)
    {


        $year = new DateTime($request->year);
        $orders = Order::where('order_month', $request->month)->where('order_year', $request->year_name)->latest()->get();
        return view('backend.reports.orders_by_month', compact('orders'));


    }

    public function search_by_year(Request $request)
    {


        $orders = Order::where('order_year',$request->year)->latest()->get();
        return view('backend.reports.orders_by_year', compact('orders'));


    }
}
