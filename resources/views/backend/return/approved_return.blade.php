@extends('admin.admin_master')
@section('admin')

    <div class="container-full">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Approved Returns</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Approved Return Orders</li>
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
                                <table id="complex_header" class="table table-striped table-bordered display"
                                       style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Invoice No</th>
                                        <th> Amount</th>
                                        <th> Payment</th>
                                        <th> Status</th>
                                        <th> Return Request Date</th>
                                        <th> Return Approval Date</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                    <tfoot>
                                    @foreach($orders as $item)
                                        <tr>
                                            <td>{{$item->order_date}}</td>
                                            <td>{{$item->invoice_no}}</td>
                                            <td>{{$item->amount}}</td>
                                            <td>{{$item->payment_method}}</td>

                                            <td>
                                                <span
                                                    class="badge badge-pill badge-success text-capitalize"> ِApproved Return </span>


                                            </td>
                                            <td>{{$item->return_date}}</td>


                                            <td class="text-center">
                                                @if($item->updated_at != NULL)
                                                    {{$item->updated_at->format('j-F-Y')}}

                                                @else
                                                    ---
                                                @endif


                                            </td>

                                            <td width="30%">
                                                <a href="{{ route('confirmedOrder.details',$item->id) }}"
                                                   class="btn btn-info"
                                                   title="View order"> <i class="fa fa-eye"></i></a>
                                                <a target="_blank" href=" {{ route('invoice.download',$item->id) }}"
                                                   class="btn btn-danger" title=" Invoice download" id="download"><i
                                                        class="fa fa-download"></i></a>

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
    <!-- /.row -->
    </section>
    <!-- /.content -->

    </div>

@endsection
