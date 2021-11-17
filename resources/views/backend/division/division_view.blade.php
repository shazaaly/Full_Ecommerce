@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Shipping Divisions Data</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">All Shipping Divisions</li>
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
                            <h3 class="box-title">Shipping Divisions List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Shipping Division Name</th>

                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                    <tfoot>
                                    @foreach($divisions as $item)
                                        <tr>
                                            <th>{{$item->division_name}}</th>
                                            <td width="40%">
                                                <a href="{{ route('division.edit',$item->id) }}"
                                                   class="btn btn-info"
                                                   title="Edit"> <i class="fa fa-pencil"></i></a>
                                                <a href=" {{ route('division.delete',$item->id) }}"
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

                {{--                Add Division        --}}

                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Shipping Division</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action=" {{ route('division.store') }}" method="post">
                                    @csrf

                                    <div class="form-group">
                                        <h5> Shipping Division Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text"
                                                   name="division_name"
                                                   class="form-control">

                                            @error('division_name')
                                            <span class="text-danger"> {{$message}} </span>
                                            @enderror

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
        </section>


    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->

    </div>

@endsection
