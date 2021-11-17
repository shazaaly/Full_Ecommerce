@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Users Data</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Total Users
                                    &nbsp; <span class="badge badge-pill  badge-danger">{{$users->count()}}</span></li>
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
                                        <th>Image </th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                    <tfoot>
                                    @foreach($users as $user)
                                        <tr>
                                            <th><img style="width:100px; height: 75px;"
                                                     src="{{ (!empty($user-> profile_photo_path)) ? url('upload/user_images/'.$user->profile_photo_path) :url('upload/user_images/noImage.jpg')}}"></th>
                                            <th>{{$user->name}}</th>
                                            <th>{{$user->email}}</th>
                                            <th>{{$user->phone}}</th>
                                            <th>

                                                @if($user->UserOnline())
                                                    <span class="badge badge-success badge-pill">Active Now</span>

                                                @else
                                                    <span class="badge badge-warning badge-pill ">{{ \Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</span>

                                                @endif
                                            </th>

                                            <th>
                                                <a href="" class="btn btn-info" title="Edit"> <i class="fa fa-pencil"></i></a>
                                                <a href=" " class="btn btn-danger" title="Delete" id="delete"><i class="fa fa-trash"></i></a>

                                            </th>

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
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

@endsection
