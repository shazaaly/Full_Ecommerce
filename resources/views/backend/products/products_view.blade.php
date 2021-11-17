@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Products Data</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Total Products</li>
                                &nbsp; <span class="badge badge-pill  badge-danger">{{$products->count()}}</span></li>

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

                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product En</th>
                                        <th>Product Ar</th>
                                        <th>Price</th>
                                        <th>Discount</th>
                                        <th>Status</th>
                                        <th>Product Qty</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                    <tfoot>

                                    @foreach($products as $item)
                                        <tr>
                                            <td>
                                                <img src="{{ asset( $item->product_thumbnail) }}"
                                                     style="width: 60px; height: 50px;">
                                            </td>


                                            <td>{{ $item->product_name_en }}</td>
                                            <td>{{ $item->product_name_ar }}</td>
                                            <td>{{ $item->selling_price }} &#36;	</td>
                                            <td>
                                                @if($item->discount_price == null)
                                                    <span class="badge badge-pill badge-danger">No Discount</span>

                                                @else
                                                    {{--                                                    <span class="badge badge-pill badge-info">{{$item->discount_price}}</span>--}}
                                                    @php
                                                        $amount =$item->selling_price  - $item->discount_price;
                                                        $discount = ($amount / $item->selling_price)*100;
                                                    @endphp
                                                    <span class="badge badge-pill badge-info badge-lg">{{round($discount)}} &#37;</span>



                                                @endif
                                            </td>


                                            <td>
                                                @if( $item->status == 1)
                                                    <span class="badge badge-pill badge-success"> Active</span>

                                                @else
                                                    <span class="badge badge-pill badge-danger"> Inactive</span>

                                                @endif


                                            </td>
                                            <td>{{ $item->product_qty }}</td>


                                            <td width="30%">
                                                <a href="{{ route('edit.product',$item->id) }}" class="btn btn-info"
                                                   title="Edit Data"><i class="fa fa-pencil"></i> </a>
                                                <a href="{{ route('product.delete',$item->id) }}"
                                                   class="btn btn-danger" title="Delete Data" id="delete">
                                                    <i class="fa fa-trash"></i></a>

                                                @if( $item->status == 1)
                                                    <a href="{{ route('inactivate.product',$item->id) }}"
                                                       class="btn btn-danger"
                                                       title="Inactivate"><i class="fa fa-arrow-down"></i> </a>

                                                @else
                                                    <a href="{{ route('activate.product',$item->id) }}"
                                                       class="btn btn-success"
                                                       title="Activate"><i class="fa fa-arrow-up"></i> </a>

                                                @endif
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

            </div>
        </section>
    </div>
    <!-- /.box-body -->

@endsection
