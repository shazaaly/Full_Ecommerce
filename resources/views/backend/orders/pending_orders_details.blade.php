@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
        <!--Basic!-->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Order Details</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Order Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">

            <div class="row">

                <!--Bordered box!-->
                <div class="col-md-6 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title"><strong>Shipping Details</strong></h4>
                        </div>

                        <table class="table">
                            <tr>
                                <th> Name</th>
                                <th>{{ $order->user->name }}</th>
                            </tr>

                            <tr>
                                <th> Phone :</th>
                                <th>{{ $order->phone }}</th>
                            </tr>

                            <tr>
                                <th> Email :</th>
                                <th>{{ $order->email }}</th>
                            </tr>


                            <tr>
                                <th> Division :</th>
                                <th>{{ $order->division->division_name }}</th>
                            </tr>
                            <tr>
                                <th> District :</th>
                                <th>{{ $order->district->district_name }}</th>
                            </tr>
                            <tr>
                                <th> State :</th>
                                <th>{{ $order->state->state_name }}</th>
                            </tr>


                            <tr>
                                <th> Postal Code :</th>
                                <th>{{ $order->post_code }}</th>
                            </tr>
                            <tr>
                                <th> Order Date :</th>
                                <th>{{ $order->order_date }}</th>
                            </tr>

                        </table>

                    </div>
                </div>

                <div class="col-md-6 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title"><strong>Order Details</strong></h4>
                        </div>
                        <table class="table">

                            @if($order->transaction_id != null)
                                <tr>
                                    <th> Transaction ID</th>
                                    <th style="color: red;">{{ $order->transaction_id }}</th>
                                </tr>

                            @else

                            @endif


                            <tr>
                                <th> Order Total :</th>
                                <th> $ {{ $order->amount }}</th>
                            </tr>

                            <tr>
                                <th> Invoice :</th>
                                <th>{{ $order->invoice_no }}</th>
                            </tr>

                            <tr>
                                <th> Payment Method :</th>
                                <th>{{ $order->payment_method }}</th>
                            </tr>

                            <tr>
                                <th> Notes :</th>
                                <th>{{ $order->notes }}</th>
                            </tr>
                            <tr>
                                <th> Order Status :</th>
                                <th><span class="badge badge-pill badge-info-light"> {{ $order->status }} </span></th>
                            </tr>

                            <tr>
                                <th></th>
                                <th>
                                    @if($order->status == 'pending')

                                        <a href="{{ route('pending_to_confirmed', $order->id) }}" id="confirm"
                                           class="btn btn-block btn-success">Confirm Order</a>
{{--                                        <a href="{{ route('cancel', $order->id) }}" id="cancel"--}}
{{--                                           class="btn btn-block btn-success">Cancel Order</a>--}}

                                    @elseif(($order->status == 'confirmed'))
                                        <a href="{{ route('confirmed_to_processing', $order->id) }}" id="process"
                                           class="btn btn-block btn-success">Process Order</a>

                                    @elseif(($order->status == 'processing'))
                                        <a href="{{ route('processing_to_picked', $order->id) }}" id="pick"
                                           class="btn btn-block btn-success">Pick Order</a>

                                    @elseif(($order->status == 'picked'))
                                        <a href="{{ route('picked_to_shipped', $order->id) }}" id="ship"
                                           class="btn btn-block btn-success">Ship Order</a>

                                    @elseif(($order->status == 'shipped'))
                                        <a href="{{ route('shipped_to_delivered', $order->id) }}" id="deliver"
                                           class="btn btn-block btn-success">Deliver Order</a>







                                    @endif

                                </th>
                            </tr>


                        </table>

                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title"><strong>Order Items</strong></h4>
                        </div>
                        <table>
                            <tbody>
                            <tr>
                                <td width="10%">
                                    <label class="ml-20" for="">Image</label>
                                </td>

                                <td width="10%">
                                    <label for="">Product Name</label>
                                </td>

                                <td width="10%">
                                    <label for="">Product Code</label>
                                </td>


                                <td width="10%">
                                    <label for="">Color</label>
                                </td>

                                <td width="10%">
                                    <label for="">Size</label>
                                </td>


                                <td width="10%">
                                    <label for="">Quantity</label>
                                </td>

                                <td width="10%">
                                    <label for="">Price</label>
                                </td>


                            </tr>


                            @foreach($orderItems as $item)
                                <tr>
                                    <td width="10%">
                                        <label for=""> <img class="img-thumbnail ml-20"
                                                            style="width: 70px; height: 70px;"
                                                            src="{{asset($item->product->product_thumbnail)}}"></label>
                                    </td>

                                    <td width="10%">
                                        <label for="">{{$item->product->product_name_en}}</label>
                                    </td>

                                    <td width="10%">
                                        <label for="">{{$item->product->product_code}}</label>
                                    </td>
                                    <td width="10%">
                                        <label for="">{{$item->color}}</label>
                                    </td>

                                    <td width="10%">
                                        <label for="">{{$item->size}}</label>
                                    </td>

                                    <td width="10%">
                                        <label for="">{{$item->qty}}</label>
                                    </td>


                                    <td width="10%">
                                        <label for=""> ${{$item->price * $item->qty}} ( {{$item->price}}
                                            * {{$item->qty}} ) </label>
                                    </td>


                                </tr>

                            @endforeach


                            </tbody>

                        </table>

                    </div>
                </div>


            </div>
        </section>


    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->

    </div>

@endsection
