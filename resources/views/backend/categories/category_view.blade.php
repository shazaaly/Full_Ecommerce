@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Categories Data</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Total  Categories</li>
                                &nbsp; <span class="badge badge-pill  badge-danger">{{$categories->count()}}</span></li>

                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Category EN</th>
                                        <th>Category AR</th>
                                        <th> Icon</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                    <tfoot>
                                    @foreach($categories as $category)
                                        <tr>
                                            <th>{{$category->category_name_en}}</th>
                                            <th>{{$category->category_name_ar}}</th>
                                            <th><span>
                                                    <i class="{{$category->category_icon}} font-size-24"></i>
                                                </span>
                                            </th>
                                            <th>
                                                <a href="{{ route('category.edit',$category->id) }}"
                                                   class="btn btn-info"
                                                   title="Edit"> <i class="fa fa-pencil"></i></a>
                                                <a href=" {{ route('category.delete',$category->id) }}"
                                                   class="btn btn-danger" title="Delete" id="delete"><i
                                                        class="fa fa-trash"></i></a>

                                            </th>

                                        </tr>
                                    @endforeach
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col -->

                {{--                Add category        --}}

                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add category</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action=" {{ route('category.store') }}" method="post">
                                    @csrf

                                    <div class="form-group">
                                        <h5> Category Name EN<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input id="current_password" type="text"
                                                   name="category_name_en"
                                                   class="form-control">

                                            @error('category_name_en')
                                            <span class="text-danger"> {{$message}} </span>
                                            @enderror

                                        </div>

                                        <div class="form-group">
                                            <h5> Category Name AR<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input id="password" type="text"
                                                       name="category_name_ar"
                                                       class="form-control">
                                                @error('category_name_ar')
                                                <span class="text-danger"> {{$message}} </span>
                                                @enderror

                                            </div>

                                            <div class="form-group">
                                                <h5> Category Icon
                                                    <span class="text-info"><p class="text-info">choose from: https://fontawesome.com/v4.7/cheatsheet/</p></span>
                                                </h5>
                                                <div class="controls">
                                                    <input
                                                        type="text"
                                                        placeholder="example:  fa-mobile "
                                                        name="category_icon"
                                                        class="form-control">


                                                    @error('category_icon')
                                                    <span class="text-danger"> {{$message}} </span>
                                                    @enderror

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


            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

@endsection
