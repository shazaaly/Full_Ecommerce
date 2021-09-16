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
                            <h4 class="box-title">Admin Profile</h4>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form action=" {{route('admin.profile.store')}} " method="post" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">
                                            <div class="col-12">

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5> Username<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="name"
                                                                       value="{{$editData->name}}" class="form-control"
                                                                       required="">

                                                            </div>
                                                        </div>


                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Email <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="email" name="email"
                                                                       value="{{$editData->email}}" class="form-control"
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
                                                            <h5>Profile Image</h5>
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
                                                             src=" {{ (!empty($editData->profile_photo_path)) ? url('upload/admin_images/'.$editData->profile_photo_path) : url('upload/1.jpg')}}"
                                                             alt="User Avatar">

                                                    </div>


                                                </div>


                                            </div>
                                        </div>


                                        <div class="text-xs-right">
                                            <button type="submit" class="btn btn-rounded btn-info">Submit</button>
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
