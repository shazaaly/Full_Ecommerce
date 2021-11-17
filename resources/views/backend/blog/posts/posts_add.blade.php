@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        </div>

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Blog Post</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('post.store')}}" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Post Title En <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="post_title_en" class="form-control"
                                                               required>
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
                                                        <input type="text" name="post_title_ar" class="form-control">
                                                    </div>
                                                    @error('post_title_ar')
                                                    <span class="text-danger">
                                                        {{$message}}
                                                    </span>

                                                    @enderror
                                                </div>


                                            </div>



                                        </div>

                                        {{--                                        seconed row      --}}
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5> Select Blog Category <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="category_id" id="select" class="form-control"
                                                                required>

                                                            <option value="" selected="" disabled>Select Category
                                                            </option>
                                                            @foreach($categories as $category)

                                                                <option
                                                                    value="{{$category->id}}">{{$category->blog_category_name_en}}</option>
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


                                                    <img src="" id="mainThumb">
                                                </div>


                                            </div>

                                        </div>


                                        <div class="row mt-4">
                                            <div class="col-md-6">
                                                <h5>Post Details En <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                        <textarea name="post_details_en" id="editor1" class="form-control"
                                                                  required placeholder="Textarea text"></textarea>
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
                                                                  required placeholder="Textarea text"></textarea>
                                                    @error('post_details_ar')
                                                    <span class="text-danger">
                                                        {{$message}}
                                                    </span>

                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                        <hr>


                                    </div>


                                </div>


                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Blog Post">
                                </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
        </section>
    </div>
    <!-- /.box -->

    </section>
    <!-- /.content -->
    </div>


    {{--    js for main thumbnail--}}

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

    {{--    js for thumbnails multi images  --}}







@endsection
