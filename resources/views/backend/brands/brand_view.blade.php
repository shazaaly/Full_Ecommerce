@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Brands Data</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Total Brands</li>
                                &nbsp;
                                &nbsp; <span class="badge badge-pill  badge-danger">{{$brands->count()}}</span></li>


                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-8">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">Complex headers (rowspan and colspan)</h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Brand EN</th>
                                        <th>Brand AR</th>
                                        <th>Image</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                    <tfoot>
                                    @foreach($brands as $brand)
                                        <tr>
                                            <th>{{$brand->brand_name_en}}</th>
                                            <th>{{$brand->brand_name_ar}}</th>
                                            <th><img style="width:100px; height: 75px;"
                                                     src="{{asset($brand->brand_image)}}"></th>
                                            <th>
                                                <a href="{{ route('brand.edit',$brand->id) }}" class="btn btn-info" title="Edit"> <i class="fa fa-pencil"></i></a>
                                                <a href=" {{ route('brand.delete',$brand->id) }}" class="btn btn-danger" title="Delete" id="delete"><i class="fa fa-trash"></i></a>

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

                {{--                Add Brand        --}}

                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Brand</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action=" {{ route('brand.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <h5> Brand Name EN<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input id="current_password" type="text"
                                                   name="brand_name_en"
                                                   class="form-control">

                                            @error('brand_name_en')
                                            <span class="text-danger"> {{$message}} </span>
                                            @enderror

                                        </div>

                                        <div class="form-group">
                                            <h5> Brand Name AR<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input id="password" type="text"
                                                       name="brand_name_ar"
                                                       class="form-control">
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
