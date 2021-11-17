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
                    <h4 class="box-title">Add Product</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('product.store')}}" enctype="multipart/form-data">
                                @csrf


                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5> Select Category <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="category_id" id="select" class="form-control"
                                                                required>

                                                            <option value="" selected="" disabled>Select Category
                                                            </option>
                                                            @foreach($categories as $category)

                                                                <option
                                                                    value="{{$category->id}}">{{$category->category_name_en}}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5> Select Subcategory <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="subcategory_id" id="select" class="form-control"
                                                                required>

                                                            <option value="" selected="" disabled>Select Subcategory
                                                            </option>

                                                            {{--                     use jq to display corresp subcat acc to category  --}}

                                                        </select>
                                                    </div>
                                                </div>


                                            </div>

                                            <div class="col-md-4">
                                                {{--subsub--}}
                                                <div class="form-group">
                                                    <h5> Select Sub-subCategory <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="subsubcategory_id" id="select"
                                                                class="form-control" required>

                                                            <option value="" selected="" disabled>Select Sub-subCategory
                                                            </option>

                                                        </select>
                                                    </div>
                                                </div>


                                            </div>


                                        </div>

                                        {{--                                        seconed row      --}}
                                        <div class="row">
                                            <div class="col-md-4">
                                                {{--                                                brand--}}
                                                <div class="form-group">
                                                    <h5> Select Brand <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="brand_id" id="select" class="form-control"
                                                                required>

                                                            <option value="" selected="" disabled>Select Brand
                                                            </option>
                                                            @foreach($brands as $brand)

                                                                <option
                                                                    value="{{$brand->id}}">{{$brand->brand_name_en}}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Name En <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_name_en" class="form-control"
                                                               required>
                                                    </div>
                                                    @error('product_name_en')
                                                    <span class="text-danger">
                                                        {{$message}}
                                                    </span>

                                                    @enderror
                                                </div>


                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Name Ar <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_name_ar" class="form-control">
                                                    </div>
                                                    @error('product_name_ar')
                                                    <span class="text-danger">
                                                        {{$message}}
                                                    </span>

                                                    @enderror
                                                </div>


                                            </div>


                                        </div>

                                        {{--                                        Third Row        --}}
                                        <div class="row">


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Qty <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_qty" class="form-control">
                                                    </div>
                                                    @error('product_qty')
                                                    <span class="text-danger">
                                                        {{$message}}
                                                    </span>

                                                    @enderror
                                                </div>

                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Code <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_code" class="form-control">
                                                    </div>
                                                    @error('product_code')
                                                    <span class="text-danger">
                                                        {{$message}}
                                                    </span>

                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                <h5>Product Tags En <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_tags_en" class="form-control"
                                                           value="tag 1,tag 2,tag 3" data-role="tagsinput">
                                                    @error('product_tags_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>


                                            </div>


                                        </div>

                                        {{--                                        Forth row         --}}

                                        <div class="row">


                                            <div class="col-md-4">
                                                <h5>Product Size En <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_size_en" class="form-control"
                                                           value="small,medium,large" data-role="tagsinput">
                                                    @error('product_size_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>


                                            </div>

                                            <div class="col-md-4">
                                                <h5>Product Size Ar <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_size_ar" class="form-control"
                                                           value="لارج,مديام,سمول" data-role="tagsinput">
                                                    @error('product_size_ar')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>


                                            </div>
                                            <div class="col-md-4">
                                                <h5>Product Tags Ar <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_tags_ar" class="form-control"
                                                           value="تاج 1, تاج 2,تاج 3" data-role="tagsinput">
                                                    @error('product_tags_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>


                                            </div>


                                        </div>
                                        {{--                                        Fifth row         --}}
                                        <div class="row mt-4">


                                            <div class="col-md-4">
                                                <h5>Product Color En <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_color_en" class="form-control"
                                                           value="red,blue" data-role="tagsinput">
                                                    @error('product_color_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>


                                            </div>

                                            <div class="col-md-4">
                                                <h5>Product Color Ar <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_color_ar" class="form-control"
                                                           value="أحمر,أسود" data-role="tagsinput">
                                                    @error('product_color_ar')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>


                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product selling Price <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="selling_price" class="form-control">
                                                    </div>
                                                    @error('selling_price')
                                                    <span class="text-danger">
                                                        {{$message}}
                                                    </span>

                                                    @enderror
                                                </div>


                                            </div>


                                        </div>
                                        {{--                                        Sixth row         --}}
                                        <div class="row mt-4">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Discount Price <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="discount_price" class="form-control">
                                                    </div>
                                                    @error('discount_price')
                                                    <span class="text-danger">
                                                        {{$message}}
                                                    </span>

                                                    @enderror

                                                </div>

                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Main Thumbnail <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="product_thumbnail"
                                                               class="form-control" onchange="mainThumbUrl(this)">
                                                    </div>
                                                    @error('product_thumbnail')
                                                    <span class="text-danger">
                                                        {{$message}}
                                                    </span>

                                                    @enderror


                                                    <img src="" id="mainThumb">
                                                </div>


                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Multi Images <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" id="multiImg" name="multi_img[]"
                                                               class="form-control" multiple>
                                                    </div>
                                                    @error('multi_img')
                                                    <span class="text-danger">
                                                        {{$message}}
                                                    </span>
                                                    @enderror

                                                    <div class="row" id="preview_img">


                                                    </div>
                                                </div>


                                            </div>

                                        </div>

                                        {{--                                        Seventh row       --}}

                                        <div class="row mt-4">

                                            <div class="col-md-6">
                                                <h5>Short Description En <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                        <textarea name="short_desc_en" id="textarea"
                                                                  class="form-control"
                                                                  required placeholder="Textarea text"></textarea>
                                                    @error('short_desc_en')
                                                    <span class="text-danger">
                                                        {{$message}}
                                                    </span>

                                                    @enderror
                                                </div>

                                            </div>

                                            <div class="col-md-6">
                                                <h5>Short Description Ar <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                        <textarea name="short_desc_ar" id="textarea"
                                                                  class="form-control"
                                                                  required placeholder="Textarea text"></textarea>
                                                    @error('short_desc_ar')
                                                    <span class="text-danger">
                                                        {{$message}}
                                                    </span>

                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-6">
                                                <h5>Long Description En <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                        <textarea name="long_desc_en" id="editor1" class="form-control"
                                                                  required placeholder="Textarea text"></textarea>
                                                    @error('long_desc_en')
                                                    <span class="text-danger">
                                                        {{$message}}
                                                    </span>

                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h5>Long Description Ar <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                        <textarea name="long_desc_ar" id="editor2" class="form-control"
                                                                  required placeholder="Textarea text"></textarea>
                                                    @error('long_desc_ar')
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
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_2" name="hot_deals" value="1">
                                                    <label for="checkbox_2">Hot Deals</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_3" name="featured" value="1">
                                                    <label for="checkbox_3">Featured</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_4" name="special_offer"
                                                           value="1">
                                                    <label for="checkbox_4">Special Offer</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_5" name="special_deals"
                                                           value="1">
                                                    <label for="checkbox_5">Special Deals</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Digital Product <span class="text-danger">pdf,xlx, csv </span></h5>
                                        <div class="controls">
                                            <input type="file" name="file"
                                                   class="form-control">
                                        </div>
                                    </div>

                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Product">
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

    {{--    to display child according to parent using url and id     --}}


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


            //     jq for sub sub cat:

            $('select[name="subcategory_id"]').on('change', function () {
                var subcategory_id = $(this).val();
                if (subcategory_id) {
                    $.ajax({
                        url: "{{  url('/category/sub-subcategory/ajax') }}/" + subcategory_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="subsubcategory_id"]').html('');

                            var d = $('select[name="subsubcategory_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="subsubcategory_id"]').append('<option value="' + value.id + '">' + value.subsubcategory_name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });


        });
    </script>
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

    <script>

        $(document).ready(function () {
            $('#multiImg').on('change', function () { //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function (index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function (file) { //trigger function on successful read
                                return function (e) {
                                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result).width(80)
                                        .height(80); //create image element
                                    $('#preview_img').append(img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });

    </script>






@endsection
