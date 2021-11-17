@extends('frontend.main_master')

@section('title')

    Cash On Delivery
@endsection

@section('content')


    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'> Cash On Delivery
                    </li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->


    <div class="body-content">
        <div class="container">
            <div class="checkout-box ">
                <div class="row">

                    <div class="col-md-6">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Your Payment Details</h4>
                                    </div>
                                    <div class="">
                                        <ul class="nav nav-checkout-progress list-unstyled">
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

                    <div class="col-md-6">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title"> Payment Method</h4>
                                    </div>
                                    <div class="row">

                                        <form action=" {{ route('cash.order') }}" method="post" id="payment-form">
                                            @csrf
                                            <div class="form-row">
                                                <img style="height: 100px; width: 290px;" src="{{asset('frontend/assets/images/payments/cash.png')}}">

                                                <label for="card-element">
                                                    <input type="hidden" name="name"
                                                           value="{{ $data['shipping_name'] }}">
                                                    <input type="hidden" name="email"
                                                           value="{{ $data['shipping_email'] }}">
                                                    <input type="hidden" name="phone"
                                                           value="{{ $data['shipping_phone'] }}">
                                                    <input type="hidden" name="post_code"
                                                           value="{{ $data['post_code'] }}">
                                                    <input type="hidden" name="division_id"
                                                           value="{{ $data['division_id'] }}">
                                                    <input type="hidden" name="district_id"
                                                           value="{{ $data['district_id'] }}">
                                                    <input type="hidden" name="state_id"
                                                           value="{{ $data['state_id'] }}">
                                                    <input type="hidden" name="notes" value="{{ $data['notes'] }}">


                                                </label>



                                            </div>
                                            <br>
                                            <button class="btn btn-primary">Submit Order</button>
                                        </form>


                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- checkout-progress-sidebar -->                </div>


                </div>


            </div><!-- /.row -->
        </div><!-- /.checkout-box -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        <!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div><!-- /.container -->
    </div><!-- /.body-content -->

    <script type="text/javascript">
        // Create a Stripe client.
        var stripe = Stripe('pk_test_51Jk1btHwu7py4kAfM7JJptufhJBwF1dM4xm7MCZscpB0878lLNv13mY1Yy4YaylGYH2zzgjDYgpPgWQj5JsN2TTL0016gVVeOp');
        // Create an instance of Elements.
        var elements = stripe.elements();
        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
        // Create an instance of the card Element.
        var card = elements.create('card', {style: style});
        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');
        // Handle real-time validation errors from the card Element.
        card.on('change', function (event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            stripe.createToken(card).then(function (result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });

        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);
            // Submit the form
            form.submit();
        }
    </script>





@endsection
