@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <a style="float: right" class="btn btn-primary" href="{{route('add_admin')}}">Add A New Admin</a>

            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Admins Data</h3>

                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Total Admins
                                    &nbsp; <span class="badge badge-pill  badge-danger">{{$admin_users->count()}}</span>
                                </li>

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
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Access Privileges</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                    <tfoot>
                                    @foreach($admin_users as $user)
                                        <tr>
                                            <th><img style="width:100px; height: 75px;"
                                                     src="{{ (!empty($user-> profile_photo_path)) ? url($user->profile_photo_path) :url('upload/user_images/noImage.jpg')}}">
                                            </th>
                                            <th>{{$user->name}}</th>
                                            <th>{{$user->email}}</th>
                                            <td>

                                                @if($user->brand == 1)
                                                    <span class="badge btn-primary badge-pill">Brands</span>
                                                @else
                                                @endif
                                                @if($user->category == 1)
                                                    <span class="badge btn-secondary badge-pill">Category</span>
                                                @else
                                                @endif

                                                @if($user->product == 1)
                                                    <span class="badge btn-success badge-pill">Products</span>
                                                @else
                                                @endif

                                                @if($user->slider == 1)
                                                    <span class="badge btn-warning badge-pill">Slider</span>
                                                @else
                                                @endif

                                                @if($user->coupons == 1)
                                                    <span class="badge btn-danger badge-pill">Coupons</span>
                                                @else
                                                @endif

                                                @if($user->shipping == 1)
                                                    <span class="badge btn-info badge-pill">Shipping</span>
                                                @else
                                                @endif
                                                @if($user->blog == 1)
                                                    <span class="badge btn-light badge-pill">Blog</span>
                                                @else
                                                @endif
                                                @if($user->reviews == 1)
                                                    <span class="badge btn-dark badge-pill">Reviews</span>
                                                @else
                                                @endif
                                                @if($user->orders == 1)
                                                    <span class="badge btn-outline-light badge-pill">Orders</span>
                                                @else
                                                @endif
                                                @if($user->stock == 1)
                                                    <span class="badge btn-outline-inverse badge-pill">Stock</span>
                                                @else
                                                @endif

                                                @if($user->reports == 1)
                                                    <span class="badge btn-outline-warning badge-pill">Reports</span>
                                                @else
                                                @endif
                                                @if($user->allUsers == 1)
                                                    <span class="badge btn-outline-primary badge-pill">Site Users</span>
                                                @else
                                                @endif

                                                @if($user->adminUserRole == 1)
                                                    <span
                                                        class="badge btn-outline-success badge-pill">Admin Roles</span>
                                                @else
                                                @endif


                                            </td>


                                            <th>
                                                <a href="{{ route('edit_adminUser', $user->id) }}" class="btn btn-info"
                                                   title="Edit"> <i
                                                        class="fa fa-pencil"></i></a>
                                                <a href=" {{ route('delete_adminUser', $user->id) }}"
                                                   class="btn btn-danger" title="Delete" id="delete"><i
                                                        class="fa fa-trash"></i></a>

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
