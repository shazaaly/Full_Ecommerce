@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Blog Categories List</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Total Blog Categories</li>
                                &nbsp; <span
                                    class="badge badge-pill  badge-danger">{{$blog_categories->count()}}</span></li>

                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-8">
                    <div class="box">
                        <div class="box-header">
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="complex_header" class="table table-striped table-bordered display"
                                       style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Blog Category Name EN</th>
                                        <th>Blog Category Name AR</th>
                                        <th>Created At</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                    <tfoot>
                                    @foreach($blog_categories as $category)
                                        <tr>
                                            <th>{{$category->blog_category_name_en}}</th>
                                            <th>{{$category->blog_category_name_ar}}</th>
                                            <td>{{$category->created_at}}</td>


                                            <th>
                                                <a href="{{ route('category.edit',$category->id) }}"
                                                   class="btn btn-info"
                                                   title="Edit"> <i class="fa fa-pencil"></i></a>
                                                <a href=" {{ route('category.delete',$category->id) }}"
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

                {{--                Add Blog category        --}}

                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add blog category</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action=" {{ route('blogCategory.store') }}" method="post">
                                    @csrf

                                    <div class="form-group">
                                        <h5>Blog Category Name EN<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text"
                                                   name="blog_category_name_en"
                                                   class="form-control">

                                            @error('blog_category_name_en')
                                            <span class="text-danger"> {{$message}} </span>
                                            @enderror

                                        </div>

                                        <div class="form-group">
                                            <h5>Blog Category Name AR<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text"
                                                       name="blog_category_name_ar"
                                                       class="form-control">
                                                @error('blog_category_name_ar')
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


            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

@endsection
