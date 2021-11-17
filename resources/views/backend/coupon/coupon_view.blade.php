@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Coupons Data</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">All Coupons</li>
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
                                        <th>Coupon Name</th>
                                        <th>Discount (%)</th>
                                        <th> Validity</th>
                                        <th> Status</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                    <tfoot>
                                    @foreach($coupons as $item)
                                        <tr>
                                            <th>{{$item->coupon_name}}</th>
                                            <th>{{$item->coupon_discount}}</th>
                                            <th>{{  \Carbon\Carbon::parse($item->coupon_validity)->format('D, d F Y') }}  </th>

                                            <td>
                                                @if($item->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
                                                    <span class="badge badge-pill badge-success"> Valid </span>
                                                @else
                                                    <span class="badge badge-pill badge-danger"> Invalid </span>
                                                @endif


                                            </td>
                                            <td width="30%">
                                                <a href="{{ route('coupon.edit',$item->id) }}"
                                                   class="btn btn-info"
                                                   title="Edit"> <i class="fa fa-pencil"></i></a>
                                                <a href=" {{ route('coupon.delete',$item->id) }}"
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

                {{--                Add Coupon        --}}

                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Coupon</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action=" {{ route('coupon.store') }}" method="post">
                                    @csrf

                                    <div class="form-group">
                                        <h5> Coupon Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text"
                                                   name="coupon_name"
                                                   class="form-control">

                                            @error('coupon_name')
                                            <span class="text-danger"> {{$message}} </span>
                                            @enderror

                                        </div>

                                        <div class="form-group">
                                            <h5> Coupon Discount(%)
                                                <span class="text-info"></span>
                                            </h5>
                                            <div class="controls">
                                                <input
                                                    type="number"
                                                    name="coupon_discount"
                                                    class="form-control">
                                                @error('coupon_discount')
                                                <span class="text-danger"> {{$message}} </span>
                                                @enderror

                                            </div>


                                        </div>

                                        <div class="form-group">
                                            <h5> Coupon Validity date
                                                <span class="text-info"></span>
                                            </h5>
                                            <div class="controls">
                                                <input min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"
                                                       type="date"
                                                       name="coupon_validity"
                                                       class="form-control">
                                                @error('coupon_validity')
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
        </section>


    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->

    </div>

@endsection
