@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
    </div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Edit Sub-subcategories</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Edit Sub-subcategories</li>
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

            {{--                Add  Sub-subcategories        --}}

            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Sub-subcategories</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form action=" {{ route('sub_subcategories.update', $sub_subcategory->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $sub_subcategory->id }}">

                                <div class="form-group mt-3 mt-3">
                                    <h5> Select Category <span class="text-danger">*</span></h5>

                                    <select name="category_id" id="select" class="form-control">

                                        <option value="" selected="" disabled>Select Category</option>

                                        @foreach($categories as $category)

                                            <option
                                                value="{{$category->id}}" {{ $sub_subcategory->category_id == $category->id ? 'selected':'' }}>{{$category->category_name_en}}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group mt-3 mt-3">
                                    <h5> Select Subcategory <span class="text-danger">*</span></h5>

                                    <select name="subcategory_id" id="select" class="form-control">

                                        <option value="" selected="" disabled>Select Subcategory</option>

                                        @foreach($subcategories as $subcategory)

                                            <option
                                                value="{{$subcategory->id}}" {{ $sub_subcategory->subcategory_id == $subcategory->id ? 'selected':'' }}>{{$subcategory->subcategory_name_en}}</option>
                                        @endforeach

                                    </select>
                                </div>

                                @error('category_id')
                                <span class="text-danger"> {{$message}} </span>
                            @enderror


                        </div>


                        <div class="form-group mt-3">
                            <h5> Sub-subcategory Name EN<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text"
                                       name="subsubcategory_name_en"
                                       value="{{$sub_subcategory->subsubcategory_name_en}}"
                                       class="form-control">

                                @error('subsubcategory_name_en')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror

                            </div>

                            <div class="form-group mt-3">
                                <h5> Sub-subcategory Name AR<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input id="password" type="text"
                                           name="subsubcategory_name_ar"
                                           value="{{$sub_subcategory->subsubcategory_name_ar}}"
                                           class=" form-control">
                                    @error('subsubcategory_name_ar')
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
