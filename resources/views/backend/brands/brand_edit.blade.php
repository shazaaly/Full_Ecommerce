@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Edit Brands</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Edit Brands</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <!-- /.col -->

                {{--                Add Brand        --}}

                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Brand</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action=" {{ route('brand.update', $brand->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="id" value="{{$brand->id}}">
                                    <input type="hidden" name="old_image" value="{{$brand->brand_image}}">


                                    <div class="form-group">
                                        <h5> Brand Name EN<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input id="current_password" type="text"
                                                   name="brand_name_en" value="{{$brand->brand_name_en}}"
                                                   class="form-control">

                                            @error('brand_name_en')
                                            <span class="text-danger"> {{$message}} </span>
                                            @enderror

                                        </div>

                                        <div class="form-group">
                                            <h5> Brand Name AR<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input id="password" type="text"
                                                       name="brand_name_ar" value="{{$brand->brand_name_ar}}"
                                                    class=" form-control">
                                                @error('brand_name_ar')
                                                <span class="text-danger"> {{$message}} </span>
                                                @enderror

                                            </div>

                                            <div class="form-group">
                                                <h5> Brand Image<span
                                                        class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input id="password_confirmation"
                                                           type="file"
                                                           name="brand_image"
                                                           class="form-control">

                                                    @error('brand_image')
                                                    <span class="text-danger"> {{$message}} </span>
                                                    @enderror

                                                    <div class="form-group mt-4 mb-4">
                                                        <img style="border-radius: 10px" width="100px" height="100px"
                                                             src="{{ asset($brand->brand_image) }}">


                                                    </div>

                                                </div>


                                            </div>


                                        </div>


                                    </div>


                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info">
                                        </input>
                                    </div>
                                </form>


                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div>

                <div class="col-4"></div>


            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

@endsection
