@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Edit categories</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Edit categories</li>
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

                {{--                Add category        --}}

                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit category</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action=" {{ route('category.update', $category->id) }}" method="post">
                                    @csrf

                                    <input type="hidden" name="id" value="{{$category->id}}">
                                    <input type="hidden" name="old_icon" value="{{$category->category_icon}}">


                                    <div class="form-group mt-3">
                                        <h5> category Name EN<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input id="current_password" type="text"
                                                   name="category_name_en" value="{{$category->category_name_en}}"
                                                   class="form-control">

                                            @error('category_name_en')
                                            <span class="text-danger"> {{$message}} </span>
                                            @enderror

                                        </div>

                                        <div class="form-group mt-3">
                                            <h5> category Name AR<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input id="password" type="text"
                                                       name="category_name_ar" value="{{$category->category_name_ar}}"
                                                       class=" form-control">
                                                @error('category_name_ar')
                                                <span class="text-danger"> {{$message}} </span>
                                                @enderror

                                            </div>

                                            <div class="form-group mt-3 mt-3">
                                                <h5> category Icon<span
                                                        class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <p class="text-info">choose from:
                                                        https://fontawesome.com/v4.7/cheatsheet/</p>
                                                    <input id="password_confirmation"
                                                           type="text"
                                                           name="category_icon"
                                                           value="{{$category->category_icon}}"
                                                           placeholder="Example:fa fa-apple"
                                                           class="form-control">

                                                    @error('category_icon')
                                                    <span class="text-danger"> {{$message}} </span>
                                                    @enderror

                                                    <div class="icon-prev">
                                                        <p>
                                                        <h6>current Icon : <i class="{{$category->category_icon}} font-size-26"></i></h6>
                                                        </p>


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
