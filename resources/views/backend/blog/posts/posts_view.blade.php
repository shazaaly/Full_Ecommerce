@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Blog Posts List</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Total Blog Posts</li>
                                &nbsp; <span class="badge badge-pill  badge-danger">{{$posts->count()}}</span></li>

                                &nbsp;

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
                            <a href="{{ route('add.post') }}" class="btn btn-primary" style="float: right; margin-left: 1rem;">Add Post</a>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="complex_header" class="table table-striped table-bordered display"
                                       style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Post Image</th>
                                        <th>Post Category</th>
                                        <th>Post Title EN</th>
                                        <th>Post Title AR</th>
                                        <th>Created At</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                    <tfoot>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td> <img src="{{asset($post->post_image)}}" style="width: 60px; height: 60px;" ></td>

                                            <td>{{$post->category->blog_category_name_en}}</td>
                                            <td>{{$post->post_title_en}}</td>
                                            <td>{{$post->post_title_ar}}</td>

                                            <td>{{$post->created_at->diffForHumans()}}</td>


                                            <td width="15%">
                                                <a href="{{ route('post.edit',$post->id) }}"
                                                   class="btn btn-info"
                                                   title="Edit"> <i class="fa fa-pencil"></i></a>
                                                <a href=" {{ route('post.delete',$post->id) }}"
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




            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

@endsection
