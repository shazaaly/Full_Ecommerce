@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Edit Post</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Edit Post</li>
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


                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Post</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action=" {{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="id" value="{{$post->id}}">
                                    <input type="hidden" name="old_image" value="{{$post->post_image}}">


                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Post Title En <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="post_title_en" class="form-control"
                                                           value="{{$post->post_title_en}}">
                                                </div>
                                                @error('post_title_en')
                                                <span class="text-danger">
                                                        {{$message}}
                                                    </span>

                                                @enderror
                                            </div>


                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Post Title Ar<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input value="{{$post->post_title_ar}}" type="text" name="post_title_ar" class="form-control">
                                                </div>
                                                @error('post_title_ar')
                                                <span class="text-danger">
                                                        {{$message}}
                                                    </span>

                                                @enderror
                                            </div>


                                        </div>



                                    </div>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5> Select Blog Category <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="category_id" id="select" class="form-control"
                                                            required>

                                                        <option selected="" disabled>
                                                        </option>
                                                        @foreach($categories as $category)


                                                                <option value="{{$category->id}}" {{ $post->category_id == $category->id ? 'selected':'' }}>{{$category->blog_category_name_en}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Post Image <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="post_image"
                                                           class="form-control" onchange="mainThumbUrl(this)">
                                                </div>
                                                @error('post_image')
                                                <span class="text-danger">
                                                        {{$message}}
                                                    </span>

                                                @enderror

                                                <img style="height: 200px; width: 300px;" class="card-img-top"
                                                     src="{{ asset($post->post_image) }}">

                                                <img src="" id="mainThumb">
                                            </div>


                                        </div>

                                    </div>


                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <h5>Post Details En <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                        <textarea name="post_details_en" id="editor1" class="form-control"
                                                                   placeholder="Textarea text"></textarea>
                                                @error('post_details_en')
                                                <span class="text-danger">
                                                        {{$message}}
                                                    </span>

                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>Post Details Ar <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                        <textarea name="post_details_ar" id="editor2" class="form-control"
                                                                   placeholder="Textarea text"></textarea>
                                                @error('post_details_ar')
                                                <span class="text-danger">
                                                        {{$message}}
                                                    </span>

                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <hr>



                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info" value="Update">
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

    {{--    js for post image--}}

    <script type="text/javascript">
        function mainThumbUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#mainThumb').attr('src', e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>


@endsection
