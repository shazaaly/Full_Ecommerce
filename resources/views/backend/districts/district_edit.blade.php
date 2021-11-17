@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Edit Shipping  Districts</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Edit Shipping  Districts</li>
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

                {{--                Add  District        --}}

                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit District</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action=" {{ route('district.update', $district->id) }}" method="post">
                                    @csrf

                                    {{--                                    <input type="hidden" name="id" value="{{$ Division->id}}">--}}

                                    <div class="form-group mt-3">
                                        <h5> Shipping Division Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="division_id" id="select" class="form-control">

                                                <option value="" selected="" disabled>Select Division</option>

                                                @foreach($divisions as $div)
                                                    <option value="{{ $div->id }}" {{ $div->id == $district->division_id ? 'selected': '' }} >{{ $div->division_name }}</option>
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
                                                   value="{{$district->district_name}}"
                                                   class="form-control">

                                            @error('district_name')
                                            <span class="text-danger"> {{$message}} </span>
                                            @enderror

                                        </div>

                                    </div>



                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info" value="Update">
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
