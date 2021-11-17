@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Sub-subcategories Data</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Total Sub-subcategories</li>
                                &nbsp; <span class="badge badge-pill  badge-danger">{{$sub_subcategories->count()}}</span></li>

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
                                <table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Subcategory</th>
                                        <th>Sub-subcategory Ar</th>
                                        <th>Sub-subcategory En</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                    <tfoot>
                                    @foreach($sub_subcategories as $sub_subcategory)
                                        <tr>

                                            <th>{{isset($sub_subcategory['category']['category_name_en']) ? $sub_subcategory['category']['category_name_en'] : '' }}</th>
                                            <th>{{$sub_subcategory->subcategory->subcategory_name_en}}</th>
                                            <th>{{$sub_subcategory->subsubcategory_name_en}}</th>
                                            <th>{{$sub_subcategory->subsubcategory_name_ar}}</th>

                                            <th>
                                                <a href="{{ route('sub_subcategories.edit',$sub_subcategory->id) }}"
                                                   class="btn btn-info"
                                                   title="Edit"> <i class="fa fa-pencil"></i></a>
                                                <a href=" {{ route('sub_subcategories.delete',$sub_subcategory->id) }}"
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

                {{--                Add subcategory        --}}

                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Sub-subcategory</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action=" {{ route('sub_subcategories.store') }}" method="post">
                                    @csrf

                                    <div class="form-group">
                                        <h5> Select Category <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category_id" id="select" class="form-control">

                                                <option value="" selected="" disabled>Select Category</option>
                                                @foreach($categories as $category)

                                                    <option
                                                        value="{{$category->id}}">{{$category->category_name_en}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5> Select Subcategory <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="subcategory_id" id="select" class="form-control">

                                                <option value="" selected="" disabled>Select Subcategory</option>

                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <h5> Sub-subcategory Name EN<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input id="current_password" type="text"
                                                   name="subsubcategory_name_en"
                                                   class="form-control">

                                            @error('subsubcategory_name_en')
                                            <span class="text-danger"> {{$message}} </span>
                                            @enderror

                                        </div>

                                        <div class="form-group">
                                            <h5> Sub-subcategory Name AR<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input id="password" type="text"
                                                       name="subsubcategory_name_ar"
                                                       class="form-control">
                                                @error('subsubcategory_name_ar')
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

    <script type="text/javascript">
        $(document).ready(function () {
            $('select[name="category_id"]').on('change', function () {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{  url('/category/subcategory/ajax') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="subcategory_id"]').append('<option value="' + value.id + '">' + value.subcategory_name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>k[

@endsection
