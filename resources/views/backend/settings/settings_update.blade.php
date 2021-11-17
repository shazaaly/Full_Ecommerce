@extends('admin.admin_master')

@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <section class="content col-md-12">

                    <!-- Basic Forms -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Site Settings</h4>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form action=" {{ route('settings_update') }} " method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$settings->id}}">
                                        <input type="hidden" name="old_image" value="{{$settings->logo}}">

                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5> Logo <i style="font-size: 12px;"> "Recommended: 139*66 px" </i><span
                                                            class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input
                                                            type="file"
                                                            name="logo"
                                                            class="form-control">

                                                        @error('logo')
                                                        <span class="text-danger"> {{$message}} </span>
                                                        @enderror

                                                        <div class="form-group mt-4 mb-4">
                                                            <img style="border-radius: 10px" width="139px" height="66px"
                                                                 src="{{asset($settings->logo)}}">


                                                        </div>

                                                    </div>


                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Email <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="email"
                                                               name="email"
                                                               class="form-control" required>

                                                    </div>
                                                </div>



                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5> Phone (1) <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text"
                                                               name="phone_one"
                                                               class="form-control"
                                                               required="">

                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5> Phone (2) <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text"
                                                               name="phone_two"
                                                               class="form-control">

                                                    </div>
                                                </div>

                                            </div>


                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5> Company Name <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text"
                                                               name="company_name"
                                                               class="form-control" required>

                                                    </div>
                                                </div>


                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5> Company Address <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text"
                                                               name="company_address"
                                                               class="form-control">

                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5> Facebook <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text"
                                                               value="{{$settings->facebook}}"
                                                               name="facebook"
                                                               class="form-control">

                                                    </div>
                                                </div>


                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5> Twitter <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text"
                                                               value="{{$settings->twitter}}"
                                                               name="twitter"
                                                               class="form-control">

                                                    </div>
                                                </div>


                                            </div>


                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5> Youtube <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text"
                                                               value="{{$settings->youtube}}"
                                                               name="youtube"
                                                               class="form-control">

                                                    </div>
                                                </div>


                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5> Instagram <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text"
                                                               value="{{$settings->instagram}}"
                                                               name="instagram"
                                                               class="form-control">

                                                    </div>
                                                </div>


                                            </div>


                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h5> Linkedin <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text"
                                                               value="{{$settings->linkedin}}"
                                                               name="linkedin"
                                                               class="form-control">

                                                    </div>
                                                </div>


                                            </div>


                                        </div>


                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-info">
                                            </input>
                                        </div>
                                </div>

                            </div>

                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
            </div>
            <!-- /.box-body -->
    </div>
    <!-- /.box -->

    </section>


    </div>
    </section>
    <!-- /.content -->
    </div>


@endsection
