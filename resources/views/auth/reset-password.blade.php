@extends('frontend.main_master')

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Reset Password...</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <!-- Sign-in -->
                    <div class="col-md-6 col-sm-6 sign-in">
                        <h4 class="">Reset Password ?</h4>

                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                <input type="email" name="email" class="form-control unicase-form-control text-input"
                                       id="email">
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Password<span>*</span></label>
                                <input type="password" name="password" class="form-control unicase-form-control text-input"
                                       id="password">
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Password Confirmation <span>*</span></label>
                                <input type="password" name="password_confirmation" class="form-control unicase-form-control text-input"
                                       id="password_confirmation">
                            </div>


                            <button type="submit"
                                    class="btn-upper btn btn-primary checkout-page-button">
                                Reset Password
                            </button>
                        </form>

                    </div>
                    <!-- Sign-in -->

                    <!-- /.row -->
                </div><!-- /.sigin-in-->
                <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            @include('frontend.body.brands')
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
            </div><!-- /.container -->
        </div><!-- /.body-content -->


        @include('frontend.body.brands')

        <script src="{{asset('frontend/switchstylesheet/switchstylesheet.js')}}"></script>

        <script>
            $(document).ready(function () {
                $(".changecolor").switchstylesheet({seperator: "color"});
                $('.show-theme-options').click(function () {
                    $(this).parent().toggleClass('open');
                    return false;
                });
            });

            $(window).bind("load", function () {
                $('.show-theme-options').delay(2000).trigger('click');
            });
        </script>
        <!-- For demo purposes ??? can be removed on production : End -->




@endsection
