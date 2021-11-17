@extends('admin.admin_master')

@section('admin')

    @php
        $date = date('d F Y');
        $todaySale =  \App\Models\Order::where('order_date',$date)->sum('amount');

        $month = date('F');
        $monthSale =  \App\Models\Order::where('order_month',$month)->sum('amount');

         $year = date('Y');
        $yearSale =  \App\Models\Order::where('order_year',$year)->sum('amount');

        $pending_orders = \App\Models\Order::where('status', 'pending')->count('status');

    @endphp


    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-primary-light rounded w-60 h-60">
                                <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Today's Sale</p>
                                <h3 class="text-white mb-0 font-weight-500"> $ {{$todaySale}} <small
                                        class="text-success"><i
                                        ></i> USD </small></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-warning-light rounded w-60 h-60">
                                <i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Month's Sales :<span
                                        class="text-danger"> {{$month}} </span></p>
                                <h3 class="text-white mb-0 font-weight-500">$ {{ $monthSale }} <small
                                        class="text-success"><i>
                                        </i> USD</small></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-info-light rounded w-60 h-60">
                                <i class="text-info mr-0 font-size-24 mdi mdi-sale"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16"> Year's Sales :<span
                                        class="text-danger"> {{$year}} </span></p>
                                <h3 class="text-white mb-0 font-weight-500">$ {{ $yearSale }} <small
                                        class="text-danger"><i
                                        ></i>USD </small></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-danger-light rounded w-60 h-60">
                                <i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
                            </div>


                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Pending Orders</p>
                                <h3 class="text-white mb-0 font-weight-500">{{$pending_orders}} orders <small
                                        class="text-danger">
                                    </small></h3>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            @php
                                $orders = App\Models\Order::where('status', 'pending')->orderBy('id', 'DESC')->get();

                            @endphp
                            <h4 class="box-title align-items-start flex-column">
                                Recent Orders
                            </h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table no-border">
                                    <thead>
                                    <tr class="text-uppercase bg-lightest">
                                        <th style="min-width: 250px"><span class="text-white">Date</span></th>
                                        <th style="min-width: 100px"><span class="text-fade">Invoice</span></th>
                                        <th style="min-width: 100px"><span class="text-fade">Amount</span></th>
                                        <th style="min-width: 150px"><span class="text-fade">Payment</span></th>
                                        <th style="min-width: 130px"><span class="text-fade">status</span></th>
                                        <th style="min-width: 120px"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                   @foreach($orders as $item)
                                    <tr>
                                        <td class="pl-0 py-8">
                                            <div class="d-flex align-items-center">


                                                <div>
                                                    <a href="#"
                                                       class="text-white font-weight-600 hover-primary mb-1 font-size-16">
                                                        {{ $item->order_date }}
                                                    </a>
                                                    <span
                                                        class="text-fade d-block">{{ $item->division->division_name }}, {{ $item->district->district_name }}, {{ $item->state->state_name }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
												<span class="text-fade font-weight-600 d-block font-size-16">
													{{$item->invoice_no}}
												</span>
                                            <span class="text-white font-weight-600 d-block font-size-16">

												</span>
                                        </td>
                                        <td>
												<span class="text-fade font-weight-600 d-block font-size-16">
													${{$item->amount}}
												</span>
                                            <span class="text-white font-weight-600 d-block font-size-16">

												</span>
                                        </td>
                                        <td>
												<span class="text-fade font-weight-600 d-block font-size-16">
												{{$item->payment_method}}
												</span>
                                            <span class="text-white font-weight-600 d-block font-size-16">
												</span>
                                        </td>
                                        <td>
                                            <span class="badge badge-warning-light badge-lg">{{ $item->status }}</span>
                                        </td>
                                        <td class="text-right">
                                            <a href="#"
                                               class="waves-effect waves-light btn btn-info btn-circle mx-5"><span
                                                    class="mdi mdi-bookmark-plus"></span></a>
                                            <a href="{{ route('pendingOrder.details', $item->id) }}"
                                               class="waves-effect waves-light btn btn-info btn-circle mx-5"><span
                                                    class="mdi mdi-arrow-right"></span></a>
                                        </td>
                                    </tr>

                                   @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
