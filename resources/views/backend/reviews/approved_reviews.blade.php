@extends('admin.admin_master')
@section('admin')

    <div class="container-full">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Approved Reviews</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Approved Reviews</li>
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

                                        <th> Summary</th>
                                        <th> Comment</th>
                                        <th> User</th>
                                        <th> Product Name</th>
                                        <th> Status</th>
                                        <th> Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                    <tfoot>
                                    @foreach($reviews as $item)
                                        <tr>
                                            <td>{{$item->summary}}</td>
                                            <td>{{$item->comment}}</td>
                                            <td>{{$item->user->name}}</td>

                                            <td>{{$item->product->product_name_en}}</td>

                                            <td>
                                                @if($item->status == 0)
                                                    <span class="badge badge-pill badge-primary">Pending Review </span>
                                                @elseif($item->status == 2)
                                                    <span
                                                        class="badge badge-pill badge-success">Approved Review</span>
                                                @endif

                                            </td>

                                            <td>
                                                <a id="delete" href="{{ route('review_delete', $item->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>

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
