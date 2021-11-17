@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Slider Data</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">All Slider data</li>
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
                        <div class="box-header with-border">
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Slider Image</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                    <tfoot>
                                    @foreach($sliderItems as $item)
                                        <tr>
                                            <th><img style="width:100px; height: 75px;"
                                                     src="{{asset($item->slider_img)}}">
                                            </th>
                                            <th>
                                                @if(empty($item->title))
                                                    <span class="badge badge-pill badge-danger">No Title </span>

                                                @else
                                                    <span>  {{$item->title}}</span>

                                                @endif


                                            </th>
                                            <th>{{$item->description}}</th>
                                            <td>
                                                @if( $item->status == 1)
                                                    <span class="badge badge-pill badge-success"> Active</span>

                                                @else
                                                    <span class="badge badge-pill badge-danger"> Inactive</span>

                                                @endif


                                            </td>


                                            <td width="30%">
                                                <a href="{{ route('edit.slider',$item->id) }}" class="btn btn-info"
                                                   title="Edit Data"><i class="fa fa-pencil"></i> </a>
                                                <a href="{{ route('slider.delete',$item->id) }}"
                                                   class="btn btn-danger" title="Delete Data" id="delete">
                                                    <i class="fa fa-trash"></i></a>

                                                @if( $item->status == 1)
                                                    <a href="{{ route('inactivate.slider',$item->id) }}"
                                                       class="btn btn-danger"
                                                       title="Inactivate"><i class="fa fa-arrow-down"></i> </a>

                                                @else
                                                    <a href="{{ route('activate.slider',$item->id) }}"
                                                       class="btn btn-success"
                                                       title="Activate"><i class="fa fa-arrow-up"></i> </a>

                                                @endif
                                            </td>

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

                {{--                Add Slider        --}}

                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Slider</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action=" {{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <h5> Slider Title<span class="text-danger"></span></h5>
                                        <div class="controls">
                                            <input id="current_password" type="text"
                                                   name="title"
                                                   class="form-control">

                                            @error('title')
                                            <span class="text-danger"> {{$message}} </span>
                                            @enderror

                                        </div>

                                        <div class="form-group">
                                            <h5> Slider Description<span class="text-danger"></span></h5>
                                            <div class="controls">
                                                <input id="password" type="text"
                                                       name="description"
                                                       class="form-control">
                                                @error('description')
                                                <span class="text-danger"> {{$message}} </span>
                                                @enderror

                                            </div>

                                            <div class="form-group">
                                                <h5> Slider Images<span
                                                        class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <input id="password_confirmation"
                                                           type="file"
                                                           name="slider_img"
                                                           class="form-control">

                                                    @error('slider_img')
                                                    <span class="text-danger"> {{$message}} </span>
                                                    @enderror

                                                </div>


                                            </div>


                                        </div>


                                    </div>


                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info">Add Brand
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
