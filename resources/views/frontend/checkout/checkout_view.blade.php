@extends('frontend.main_master')

@section('title')

    Checkout
@endsection

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Checkout</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->


    <div class="body-content">
        <div class="container">
            <div class="checkout-box ">
                <div class="row">
                    <form class="register-form" action=" {{route('checkout.store')}}" method="post">
                        @csrf
                    <div class="col-md-8">
                        <div class="panel-group checkout-steps" id="accordion">
                            <!-- checkout-step-01  -->
                            <div class="panel panel-default checkout-step-01">

                                <!-- panel-heading -->

                                <!-- panel-heading -->

                                <div id="collapseOne" class="panel-collapse collapse in">

                                    <!-- panel-body  -->
                                    <div class="panel-body">
                                        <div class="row">

                                            <!-- guest-login -->
                                            <!-- guest-login -->

                                            <!-- already-registered-login -->
{{--                                          form--}}

                                                <div class="col-md-6 col-sm-6 already-registered-login">
                                                    <h4 class="checkout-subtitle"><b>Shipping Information</b></h4>
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Name
                                                            <span>*</span></label>
                                                        <input type="text" name="shipping_name"
                                                               value="{{ \Illuminate\Support\Facades\Auth::user()->name }}"
                                                               class="form-control unicase-form-control text-input"
                                                               id="exampleInputEmail1" placeholder="Full Name" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Email
                                                            <span>*</span></label>
                                                        <input type="email" name="shipping_email"
                                                               value="{{ \Illuminate\Support\Facades\Auth::user()->email }}"
                                                               class="form-control unicase-form-control text-input"
                                                               id="exampleInputEmail1" placeholder="Email" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Phone
                                                            <span>*</span></label>
                                                        <input type="phone" name="shipping_phone"
                                                               value="{{ \Illuminate\Support\Facades\Auth::user()->phone }}"
                                                               class="form-control unicase-form-control text-input"
                                                               id="exampleInputEmail1" placeholder="" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Postal Code
                                                            <span>*</span></label>
                                                        <input type="text" name="post_code"
                                                               class="form-control unicase-form-control text-input"
                                                               id="exampleInputEmail1" placeholder="">
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-6 already-registered-login">
                                                    <h4 class="checkout-subtitle"><b> </b></h4>

                                                    <div class="form-group">
                                                        <h5> Select Division <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="division_id" id="select" class="form-control"
                                                                    required>

                                                                <option value="" selected="" disabled>Select Division
                                                                </option>

                                                                @foreach($divisions as $division)

                                                                    <option
                                                                        value="{{$division->id}}">{{$division->division_name}}</option>
                                                                @endforeach


                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <h5> Select District <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="district_id" id="select" class="form-control"
                                                                    required>

                                                                <option value="" selected="" disabled>Select District
                                                                </option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <h5> Select State <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="state_id" id="select" class="form-control"
                                                                    required>

                                                                <option value="" selected="" disabled>Select State
                                                                </option>


                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Notes:
                                                            <span></span></label>
                                                        <textarea cols="30" rows="5" type="text" name="notes"
                                                                  class="form-control unicase-form-control text-input"
                                                                  id="exampleInputEmail1"></textarea>
                                                    </div>



                                                </div>



                                            <!-- already-registered-login -->




                                        </div>
                                    </div>
                                    <!-- panel-body  -->

                                </div><!-- row -->
                            </div>
                            <!-- checkout-step-01  -->


                        </div><!-- /.checkout-steps -->
                    </div>
                    <div class="col-md-4">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
                                    </div>
                                    <div class="">
                                        <ul class="nav nav-checkout-progress list-unstyled">
                                            @foreach($carts as $item)
                                                <li>
                                                    <strong>Image:</strong>
                                                    <img src="{{ asset($item->options->image) }}"
                                                         style="height: 50px; width: 50px;">
                                                </li>

                                                <li>
                                                    <strong>Qty:</strong>
                                                    <span>({{$item->qty}})</span>


                                                    <strong>Color:</strong>
                                                    <span>{{$item->options->color}}</span>

                                                    <strong>Size:</strong>
                                                    <span>{{$item->options->size}}</span>
                                                </li>
                                            @endforeach
                                            <hr>

                                            <li>

                                                @if(\Illuminate\Support\Facades\Session::has('coupon'))
                                                    <strong>Subtotal:</strong> {{$cartTotal}} $
                                                    <hr>
                                                    <strong>Coupon
                                                        Name: {{session()->get('coupon')['coupon_name']}}</strong>
                                                    <span class="text-danger">     (    {{session()->get('coupon')['coupon_discount']}} %) </span>
                                                    <hr>
                                                    <strong>Grand
                                                        Total:</strong> {{session()->get('coupon')['total_amount']}} $

                                                @else
                                                    <strong>Subtotal:</strong> {{$cartTotal}} $
                                                    <hr>
                                                    <strong>Grand Total:</strong>{{$cartTotal}}
                                                    <hr>

                                                @endif


                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- checkout-progress-sidebar -->                </div>

                    <div class="col-md-4">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Select Payment Method</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">Stripe</label>
                                            <input type="radio" name="payment_method" value="stripe">
                                            <img src="{{asset('frontend/assets/images/payments/4.png')}}">

                                        </div>

                                        <div class="col-md-4">
                                            <label for="">Card</label>
                                            <input type="radio" name="payment_method" value="card">
                                            <img src="{{asset('frontend/assets/images/payments/3.png')}}">


                                        </div>

                                        <div class="col-md-4">
                                            <label for="">Cash</label>
                                            <input type="radio" name="payment_method" value="cash">
                                            <img style="height: 30px; width: 78px;" src="{{asset('frontend/assets/images/payments/cash.png')}}">


                                        </div>


                                    </div>
                                    <hr>
                                    <button type="submit"
                                            class="btn-upper btn btn-primary checkout-page-button">Payment Step
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- checkout-progress-sidebar -->                </div>
                    </form>

                </div><!-- /.row -->
            </div><!-- /.checkout-box -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            <!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->

    <script type="text/javascript">
        $(document).ready(function () {
            $('select[name="division_id"]').on('change', function () {
                var division_id = $(this).val();
                if (division_id) {
                    $.ajax({
                        url: "{{  url('/division/district/ajax') }}/" + division_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            var d = $('select[name="state_id"]').empty();

                            var d = $('select[name="district_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="district_id"]').append('<option value="' + value.id + '">' + value.district_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });


            //     jq for sub sub cat:

            $('select[name="district_id"]').on('change', function () {
                var district_id = $(this).val();
                if (district_id) {
                    $.ajax({
                        url: "{{  url('/district/state/ajax') }}/" + district_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {

                            var d = $('select[name="state_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="state_id"]').append('<option value="' + value.id + '">' + value.state_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });


        });
    </script>





@endsection
