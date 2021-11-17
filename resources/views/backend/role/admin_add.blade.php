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
                                    <form action=" {{route('adminUser_store')}} " method="post"
                                          enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">
                                            <div class="col-12">

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5> Name<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="name"
                                                                       class="form-control"
                                                                       required="">

                                                            </div>
                                                        </div>


                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Phone <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="phone"
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
                                                                <input type="email" name="email"
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
                                                             src=" {{  url('upload/1.jpg')}}"
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
                                                            <input type="checkbox" id="checkbox_2" name="brand" value="1">
                                                            <label for="checkbox_2">Brands</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_3" name="category" value="1">
                                                            <label for="checkbox_3">categories</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_4" name="product" value="1">
                                                            <label for="checkbox_4">Products</label>
                                                        </fieldset> <fieldset>
                                                            <input type="checkbox" id="checkbox_5" name="slider" value="1">
                                                            <label for="checkbox_5">Slider</label>
                                                        </fieldset> <fieldset>
                                                            <input type="checkbox" id="checkbox_6" name="coupons" value="1">
                                                            <label for="checkbox_6">Coupons</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-4">
                                                <div class="form-group">

                                                    <div class="controls">
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_7" name="shipping"
                                                                   value="1">
                                                            <label for="checkbox_7">Shipping</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_8" name="blog"
                                                                   value="1">
                                                            <label for="checkbox_8">Blog</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_9" name="settings"
                                                                   value="1">
                                                            <label for="checkbox_9">Settings</label>
                                                        </fieldset> <fieldset>
                                                            <input type="checkbox" id="checkbox_10" name="returnOrders"
                                                                   value="1">
                                                            <label for="checkbox_10">Return Orders</label>
                                                        </fieldset> <fieldset>
                                                            <input type="checkbox" id="checkbox_11" name="reviews"
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
                                                            <input type="checkbox" id="checkbox_12" name="orders"
                                                                   value="1">
                                                            <label for="checkbox_12">Orders</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_13" name="stock"
                                                                   value="1">
                                                            <label for="checkbox_13">Stock</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_14" name="reports"
                                                                   value="1">
                                                            <label for="checkbox_14">Reports</label>
                                                        </fieldset> <fieldset>
                                                            <input type="checkbox" id="checkbox_15" name="adminUserRole"
                                                                   value="1">
                                                            <label for="checkbox_15">Admin User Roles</label>
                                                        </fieldset>
{{--                                                        <fieldset>--}}
{{--                                                            <input type="checkbox" id="checkbox_16" name="type"--}}
{{--                                                                   value="1">--}}
{{--                                                            <label for="checkbox_16">Type</label>--}}
{{--                                                        </fieldset>--}}
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_17" name="allUsers"
                                                                   value="1">
                                                            <label for="checkbox_17">All Users</label>
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
