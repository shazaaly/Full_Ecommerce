@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Shipping Districts Data</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">All Shipping Districts</li>
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
                                        <th> Division Name</th>
                                        <th> District Name</th>

                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                    <tfoot>
                                    @foreach($districts as $item)
                                        <tr>
                                            <th>{{$item->division->division_name}}</th>
                                            <th>{{$item->district_name}}</th>


                                            <td width="40%">
                                                <a href="{{ route('district.edit',$item->id) }}"
                                                   class="btn btn-info"
                                                   title="Edit"> <i class="fa fa-pencil"></i></a>
                                                <a href=" {{ route('district.delete',$item->id) }}"
                                                   class="btn btn-danger" title="Delete" id="delete"><i
                                                        class="fa fa-trash"></i></a>

                                            </td>

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

                {{--                Add  District        --}}

                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Shipping District</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action=" {{ route('district.store') }}" method="post">
                                    @csrf

                                    <div class="form-group">
                                        <h5> Shipping Division Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="division_id" id="select" class="form-control">

                                                <option value="" selected="" disabled>Select Division</option>
                                                @foreach($divisions as $division)

                                                    <option value="{{ $division->id }}">{{$division->division_name}}</option>
                                                @endforeach

                                            </select>


                                            @error('division_id')
                                            <span class="text-danger"> {{$message}} </span>
                                            @enderror

                                        </div>

                                    </div>


                                    <div class="form-group">
                                        <h5> Shipping District Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text"
                                                   name="district_name"
                                                   class="form-control">

                                            @error('district_name')
                                            <span class="text-danger"> {{$message}} </span>
                                            @enderror

                                        </div>

                                    </div>


                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info">
                                        </input>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </section>


    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->

    </div>

@endsection
