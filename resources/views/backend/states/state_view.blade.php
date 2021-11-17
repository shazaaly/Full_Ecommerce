@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Shipping States Data</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">All Shipping States</li>
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
                            <h3 class="box-title">Shipping States List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th> Division Name</th>
                                        <th> District Name</th>
                                        <th> State Name</th>

                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                    <tfoot>
                                    @foreach($states as $item)
                                        <tr>
                                            <td> {{ $item->division->division_name }}  </td>
                                            <td> {{ $item->district->district_name }}  </td>
                                            <td> {{ $item->state_name }}  </td>


                                            <td width="40%">
                                                <a href="{{ route('state.edit',$item->id) }}"
                                                   class="btn btn-info"
                                                   title="Edit"> <i class="fa fa-pencil"></i></a>
                                                <a href=" {{ route('state.delete',$item->id) }}"
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

                {{--                Add  State        --}}

                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Shipping State</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action=" {{ route('state.store') }}" method="post">
                                    @csrf


                                    <div class="form-group">
                                        <h5> Shipping Division Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="division_id" id="select" class="form-control">

                                                <option value="" selected="" disabled>Select Division</option>
                                                @foreach($divisions as $division)

                                                    <option
                                                        value="{{ $division->id }}">{{$division->division_name}}</option>
                                                @endforeach

                                            </select>


                                            @error('division_id')
                                            <span class="text-danger"> {{$message}} </span>
                                            @enderror

                                        </div>

                                    </div>


                                    @php

                                        @endphp
                                    <div class="form-group">
                                        <h5> Shipping District Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="district_id" id="select" class="form-control">

                                                <option value="" selected="" disabled>Select District</option>
                                                @foreach($districts as $district)

                                                    <option
                                                        value="{{ $district->id }}">{{ $district->district_name}}</option>
                                                @endforeach

                                            </select>


                                            @error('district_id')
                                            <span class="text-danger"> {{$message}} </span>
                                            @enderror

                                        </div>

                                    </div>


                                    <div class="form-group">
                                        <h5> Shipping State Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text"
                                                   name="state_name"
                                                   class="form-control">

                                            @error('state_name')
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="division_id"]').on('change', function(){
                var division_id = $(this).val();
                if(division_id) {
                    $.ajax({
                        url: "{{  url('shipping/division/district/ajax') }}/"+division_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            var d =$('select[name="district_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>


@endsection
