@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Edit Slider</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Edit Slider</li>
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


                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Slider</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action=" {{ route('slider.update', $slider->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="id" value="{{$slider->id}}">
                                    <input type="hidden" name="old_image" value="{{$slider->slider_img}}">


                                    <div class="form-group">
                                        <h5> Slider Title<span class="text-danger"></span></h5>
                                        <div class="controls">
                                            <input id="current_password" type="text"
                                                   name="title" value="{{$slider->title}}"
                                                   class="form-control">

                                            @error('title')
                                            <span class="text-danger"> {{$message}} </span>
                                            @enderror

                                        </div>

                                        <div class="form-group">
                                            <h5> Slider Description<span class="text-danger"></span></h5>
                                            <div class="controls">
                                                <input id="password" type="text"
                                                       name="description" value="{{$slider->description}}"
                                                    class=" form-control">
                                                @error('description')
                                                <span class="text-danger"> {{$message}} </span>
                                                @enderror

                                            </div>

                                            <div class="form-group">
                                                <h5> Brand Image<span
                                                        class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <input id="password_confirmation"
                                                           type="file"
                                                           name="slider_img"
                                                           class="form-control">

                                                    @error('slider_img')
                                                    <span class="text-danger"> {{$message}} </span>
                                                    @enderror

                                                    <div class="form-group mt-4 mb-4">
                                                        <img style="border-radius: 10px" width="100px" height="100px"
                                                             src="{{ asset($slider->slider_img) }}">


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
