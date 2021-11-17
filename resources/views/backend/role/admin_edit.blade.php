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
                            <h4 class="box-title"> Add Admin </h4>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form action="{{ route('update_adminUser', $admin->id) }} " method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="old_image" value="{{ $admin->profile_photo_path }}">

                                        <div class="row">
                                            <div class="col-12">

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5> Name<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="name"
                                                                       class="form-control" value="{{$admin->name}}"
                                                                       required="">

                                                            </div>
                                                        </div>


                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Phone <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="phone"  value="{{$admin->phone}}"
                                                                       class="form-control"
                                                                       required=""
                                                                       data-validation-required-message="This field is required">
                                                                <div class="help-block"></div>
                                                            </div>
                                                        </div>


                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Email <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="email" name="email"  value="{{$admin->email}}"
                                                                       class="form-control"
                                                                       required=""
                                                                       data-validation-required-message="This field is required">
                                                                <div class="help-block"></div>
                                                            </div>
                                                        </div>


                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5> Password<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="password" name="password"
                                                                       class="form-control"
                                                                       required="">

                                                            </div>
                                                        </div>


                                                    </div>


                                                </div>


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Admin Image</h5>
                                                            <div class="controls">
                                                                <input type="file" name="profile_photo_path" id="image"
                                                                       class="form-control">
                                                                <div class="help-block"></div>
                                                            </div>
                                                        </div>


                                                    </div>

                                                    <div class="col-md-6">
                                                        <img style="width: 100px; height: 100px;" class="img-fluid"
                                                             id="showImage"
                                                             src="{{asset($admin->profile_photo_path)}}"
                                                             alt="User Avatar">

                                                    </div>


                                                </div>


                                            </div>
                                        </div><hr>

                                        {{--                                        check boxes       --}}

                                        <div class="row mt-5">

                                            <div class="col-md-4">
                                                <div class="form-group">

                                                    <div class="controls">
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_2" name="brand" value="1" {{$admin->brand == 1? 'checked' : ''}} >
                                                            <label for="checkbox_2">Brands</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_3" name="category"  {{$admin->category == 1? 'checked' : ''}} value="1">
                                                            <label for="checkbox_3">categories</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_4" name="product"  {{$admin->product == 1? 'checked' : ''}} value="1">
                                                            <label for="checkbox_4">Products</label>
                                                        </fieldset> <fieldset>
                                                            <input type="checkbox" id="checkbox_5" name="slider"  {{$admin->slider == 1? 'checked' : ''}} value="1">
                                                            <label for="checkbox_5">Slider</label>
                                                        </fieldset> <fieldset>
                                                            <input type="checkbox" id="checkbox_6" name="coupons"  {{$admin->coupons == 1? 'checked' : ''}} value="1">
                                                            <label for="checkbox_6">Coupons</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-4">
                                                <div class="form-group">

                                                    <div class="controls">
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_7" name="shipping"  {{$admin->shipping == 1 ? 'checked' : ''}}
                                                                   value="1">
                                                            <label for="checkbox_7">Shipping</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_8" name="blog"  {{$admin->blog == 1 ? 'checked' : ''}}
                                                                   value="1">
                                                            <label for="checkbox_8">Blog</label>
                                                        </fieldset>

                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_9" name="settings" value="1" {{ $admin->settings == 1 ? 'checked' : '' }}>
                                                            <label for="checkbox_9">Settings</label>
                                                        </fieldset>


                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_10" name="returnOrders"  {{$admin->returnOrders == 1 ? 'checked' : ''}}
                                                                   value="1">
                                                            <label for="checkbox_10">Return Orders</label>
                                                        </fieldset> <fieldset>
                                                            <input type="checkbox" id="checkbox_11" name="reviews"  {{$admin->reviews == 1 ? 'checked' : ''}}
                                                                   value="1">
                                                            <label for="checkbox_11">Reviews</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">

                                                    <div class="controls">
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_12" name="orders"  {{$admin->orders == 1 ? 'checked' : ''}}
                                                                   value="1">
                                                            <label for="checkbox_12">Orders</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_13" name="stock"  {{$admin->stock == 1 ? 'checked' : ''}}
                                                                   value="1">
                                                            <label for="checkbox_13">Stock</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_14" name="reports"  {{$admin->reports == 1 ? 'checked' : ''}}
                                                                   value="1">
                                                            <label for="checkbox_14">Reports</label>
                                                        </fieldset> <fieldset>
                                                            <input type="checkbox" id="checkbox_15" name="adminUserRole"  {{$admin->adminUserRole == 1 ? 'checked' : ''}}
                                                                   value="1">
                                                            <label for="checkbox_15">Admin User Roles</label>
                                                        </fieldset>

                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_16" name="allUsers"  {{$admin->allUsers == 1 ? 'checked' : ''}}
                                                                   value="1">
                                                            <label for="checkbox_16">All Users</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-info"></input>
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

    <script type="text/javascript">

        $(document).ready(function () {

            $('#image').change(function (e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#showImage').attr('src', e.target.result);
                }

                reader.readAsDataURL(e.target.files['0']);

            });

        });


    </script>
@endsection
