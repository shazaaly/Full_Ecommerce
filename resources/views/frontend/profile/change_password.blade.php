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

                            <span
                                class="text-danger">Hi...</span>
                               <strong>{{Auth::user()->name}}</strong>
                        </h3>

                        <div><h4 class="text-danger"> Change Password</h4></div><br>

                        <div class="card-body">

                            <form method="post" action="{{ route('user.password.update') }}">

                            @csrf

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Current Password
                                    <span>*</span></label>
                                <input id="current_password" type="password" name="oldpassword"
                                       class="form-control unicase-form-control text-input"
                                >
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">New Password
                                    <span>*</span></label>
                                <input id="password" type="password" name="password"
                                       class="form-control unicase-form-control text-input"
                                >
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Confirm Password
                                    <span>*</span></label>
                                <input id="password_confirmation" type="password" name="password_confirmation"
                                       class="form-control unicase-form-control text-input"
                                >
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-danger"> Change Password</button>
                            </div>


                            </form>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>


@endsection
