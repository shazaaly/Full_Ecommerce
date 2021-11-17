@extends('admin.admin_master')
@section('admin')

    <style>
        .checked {
            color: orange;
        }
    </style>

    <div class="container-full">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Pending Reviews</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Pending Reviews</li>
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
                                        <th> Rating</th>
                                        <th> Created_at</th>
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
                                                        class="badge badge-pill badge-success">Approved Review </span>
                                                @endif

                                            </td>
                                            <td width="10%"> <span class="text-center" style="margin-left: 2rem;"> {{ $item->rating }} </span><hr>
                                                @if ($item->rating == null)


                                                @elseif($item->rating == 1)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star "></span>
                                                    <span class="fa fa-star "></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>

                                                @elseif($item->rating == 2)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star "></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>

                                                @elseif($item->rating ==3)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>

                                                @elseif($item->rating ==4)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>

                                                @elseif($item->rating ==5)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>

                                                @endif


                                            </td>
                                            <td>{{ Carbon\Carbon::parse($item->creatd_at)->diffForHumans() }}</td>


                                            <td width="30%">
                                                <a href="{{ route('approve_review',$item->id ) }}"
                                                   class="btn btn-danger"
                                                   title="Approve"> <i class="fa fa-check"></i>Approve Review</a>

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
