@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
    </div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Edit subcategories</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Edit subcategories</li>
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

                {{--                Add subcategory        --}}

                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit subcategory</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action=" {{ route('subcategory.update', $subcategory->id) }}" method="post">
                                    @csrf

                                    <input type="hidden" name="id" value="{{$subcategory->id}}">

                                    <div class="form-group mt-3 mt-3">
                                        <select name="category_id" id="select" class="form-control">

                                            <option value="" selected="" disabled>Select Category</option>

                                            @foreach($categories as $category)

                                                <option value="{{$category->id}}" {{ $subcategory->category_id == $category->id ? 'selected':'' }}>{{$category->category_name_en}}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                        @error('category_id')
                                        <span class="text-danger"> {{$message}} </span>
                                        @enderror


                                    </div>


                                    <div class="form-group mt-3">
                                        <h5> subcategory Name EN<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text"
                                                   name="subcategory_name_en"
                                                   value="{{$subcategory->subcategory_name_en}}"
                                                   class="form-control">

                                            @error('subcategory_name_en')
                                            <span class="text-danger"> {{$message}} </span>
                                            @enderror

                                        </div>

                                        <div class="form-group mt-3">
                                            <h5> subcategory Name AR<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input id="password" type="text"
                                                       name="subcategory_name_ar"
                                                       value="{{$subcategory->subcategory_name_ar}}"
                                                       class=" form-control">
                                                @error('subcategory_name_ar')
                                                <span class="text-danger"> {{$message}} </span>
                                                @enderror

                                            </div>


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
        </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->

    </div>

@endsection
