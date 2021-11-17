@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Edit coupons</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Edit coupons</li>
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

                {{--                Add coupon        --}}

                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Coupon</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action=" {{ route('coupon.update', $coupon->id) }}" method="post">
                                    @csrf

{{--                                    <input type="hidden" name="id" value="{{$coupon->id}}">--}}

                                    <div class="form-group mt-3">
                                        <h5> Coupon Name*
                                           <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text"
                                                   name="coupon_name" value="{{$coupon->coupon_name}}"
                                                   class="form-control">

                                            @error('coupon_name')
                                            <span class="text-danger"> {{$message}} </span>
                                            @enderror

                                        </div>

                                        <div class="form-group mt-3">
                                            <h5>Coupon Discount (%)<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input id="password" type="number"
                                                       name="coupon_discount" value="{{$coupon->coupon_discount}}"
                                                       class=" form-control">
                                                @error('coupon_discount')
                                                <span class="text-danger"> {{$message}} </span>
                                                @enderror

                                            </div>

                                        </div>

                                        <div class="form-group mt-3">
                                            <h5>Coupon validity<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input id="password" type="date"
                                                       name="coupon_validity" value="{{$coupon->coupon_validity}}"
                                                       class=" form-control">
                                                @error('coupon_validity')
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

                <div class="col-4"></div>


            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

@endsection
