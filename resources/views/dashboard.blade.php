@extends('frontend.main_master')

@section('content')

    <div class="body-content">

        <div class="container">
            <div class="row">


                @include('frontend.common.user_profile_side')

                <div class="col-md-2">

                </div>
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center">

                            <span class="text-danger">Hi...<strong>{{Auth::user()->name}}</strong> Welcome to e-Shop</span>
                        </h3>

                    </div>

                </div>
            </div>

        </div>
    </div>


@endsection
