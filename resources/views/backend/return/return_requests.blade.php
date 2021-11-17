@extends('admin.admin_master')
@section('admin')

    <div class="container-full">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Return Requests Data</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Return Requests</li>
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
                                        <th> Return Reason</th>
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
                                                @if($item->return_order == 1)
                                                    <span class="badge badge-pill badge-primary">Pending Request </span>
                                                @elseif($item->return_order == 2)
                                                    <span class="badge badge-pill badge-success">Success </span>
                                                @endif

                                            </td>

                                            <td>{{$item->return_reason}}</td>

                                            <td width="30%">
                                                <a href="{{ route('approve_request',$item->id ) }}"
                                                   class="btn btn-danger"
                                                   title="Approve"> <i class="fa fa-check"></i>Approve Request</a>

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
