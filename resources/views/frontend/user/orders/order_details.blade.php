@extends('frontend.main_master')

@section('content')

    <div class="body-content">

        <div class="container">
            <div class="row">

                @include('frontend.common.user_profile_side')

                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header"><h4> shipping Details</h4></div>
                        <hr>

                        <div class="card-body" style="background:#E9EBEC; ">

                            <table class="table">
                                <tr>
                                    <th> Name</th>
                                    <th>{{ $order->name }}</th>
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

                </div>


                {{--                Order Items Details            --}}

                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header"><h4> Order Details
                                <span class="text-danger">   Invoice No : {{ $order->invoice_no }}</span></h4>
                            <span class="badge badge-pill badge-dot">   Status: {{ $order->status }}</span></h4>

                        </div>
                        <hr>

                        <div class="card-body" style="background:#E9EBEC; ">

                            <table class="table">
                                <tr>
                                    <th> Transaction ID</th>
                                    <th>{{ $order->transaction_id }}</th>
                                </tr>

                                <tr>
                                    <th> Order Total :</th>
                                    <th>{{ $order->amount }}</th>
                                </tr>

                                <tr>
                                    <th> Order :</th>
                                    <th>{{ $order->email }}</th>
                                </tr>


                            </table>
                        </div>


                    </div>

                </div>


            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive ">
                        <table style="margin-top: 2rem;" class="table">
                            <tbody>
                            <tr style="background:#e2e2e2">
                                <td class="col-md-1">
                                    <label for="">Image</label>
                                </td>

                                <td class="col-md-3">
                                    <label for="">Product Name</label>
                                </td>
                                <td class="col-md-3">
                                    <label for="">Color</label>
                                </td>

                                <td class="col-md-3">
                                    <label for="">Size</label>
                                </td>


                                <td class="col-md-3">
                                    <label for="">Quantity</label>
                                </td>
                                <td class="col-md-1">
                                    <label for="">Price</label>
                                </td>
                                <td class="col-md-1">
                                    <label for="">Download</label>
                                </td>


                            </tr>


                            @foreach($orderItems as $item)
                                <tr>
                                    <td class="col-md-1">
                                        <label for=""> <img style="width: 50px; height: 50px;"
                                                            src="{{asset($item->product->product_thumbnail)}}"></label>
                                    </td>

                                    <td class="col-md-3">
                                        <label for="">{{$item->product->product_name_en}}</label>
                                    </td>
                                    <td class="col-md-3">
                                        <label for="">{{$item->color}}</label>
                                    </td>

                                    <td class="col-md-3">
                                        <label for="">{{$item->size}}</label>
                                    </td>

                                    <td class="col-md-3">
                                        <label for="">{{$item->qty}}</label>
                                    </td>


                                    <td class="col-md-3">
                                        <label for="">{{$item->price * $item->qty}}</label>
                                    </td>


                                    @php
                                        $file = \App\Models\Product::where('id', $item->product_id)->first();

                                    @endphp
                                    <td class="col-md-1">
                                        @if($order->status == 'pending' )
                                            <span class="badge badge-pill badge-success"
                                                  style="background-color: orange;">No attached file</span>

                                        @elseif($order->status == 'confirmed' )
                                            <span class="badge badge-pill badge-success" style="background-color: #c8cced;">
                                                <a target="_blank" href=" {{ asset('upload/pdf/'.$file->digital_file) }}"> Download  </a>
                                            </span>

                                        @endif
                                    </td>
                                </tr>

                            @endforeach


                            </tbody>

                        </table>

                    </div>


                </div>


            </div>

            @if($order->status !== 'delivered' )

            @else

                @if($order->return_reason == null)

                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="heading-title">Return your Order</h3>
                            <span
                                class="title-tag inner-top-ss">Please clarify why you need to return your order . </span>
                            <form action="{{route('return', $order->id)}}" method="post"
                                  class="register-form outer-top-xs" role="form">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" for="exampleOrderId1"></label>
                                    <textarea name="return_reason" id="" class="form-control" cols="30"
                                              rows="5"></textarea>
                                </div>

                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Request
                                    Return
                                </button>
                            </form>

                        </div>
                    </div><!-- /.row -->

                @else
                    <span class="badge badge-pill badge-danger" style="background: red"> Your request to return order already received!</span>
                    <hr>
                @endif

            @endif
            <br>


        </div>
    </div>


@endsection
