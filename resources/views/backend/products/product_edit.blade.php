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
                    <h4 class="box-title">Edit Product</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('update.product', $product->id) }}">

                                <input type="hidden" name="id" value="{{ $product->id }}">
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
                                                                    {{ $category->id == $product->category_id ? 'selected' : ''}}
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
                                                            @foreach($subcategories as $subcategory )
                                                                <option
                                                                    {{ $subcategory->id == $product->subcategory_id ? 'selected' : ''}}
                                                                    value="{{$subcategory->id}}">{{$subcategory->subcategory_name_en}}</option>
                                                            @endforeach

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
                                                            @foreach($subSubs as $subSub )
                                                                <option
                                                                    {{ $subSub->id == $product->subsubcategory_id ? 'selected' : ''}}
                                                                    value="{{$product->subsubcategory_id}}">{{$subSub->subsubcategory_name_en}}</option>
                                                            @endforeach

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
                                                                    {{ $brand->id == $product->brand_id ? 'selected':'' }}
                                                                    value="{{$brand->id}}">{{$brand->brand_name_en}}
                                                                </option>
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
                                                               value="{{$product->product_name_en}}" required>
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
                                                        <input value="{{$product->product_name_ar}}" type="text"
                                                               name="product_name_ar" class="form-control">
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
                                                        <input value="{{$product->product_qty}}" type="text"
                                                               name="product_qty" class="form-control">
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
                                                        <input type="text" value="{{$product->product_code}}"
                                                               name="product_code" class="form-control">
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
                                                    <input type="text" value="{{$product->product_tags_en}}"
                                                           name="product_tags_en" class="form-control"
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
                                                    <input type="text" value="{{$product->product_size_en}}"
                                                           name="product_size_en" class="form-control"
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
                                                           value="{{$product->product_size_ar}}" data-role="tagsinput">
                                                    @error('product_size_ar')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>


                                            </div>
                                            <div class="col-md-4">
                                                <h5>Product Tags Ar <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" value="{{$product->product_tags_ar}}"
                                                           name="product_tags_ar" class="form-control"
                                                           data-role="tagsinput">
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
                                                    <input type="text" value="{{$product->product_color_en}}"
                                                           name="product_color_en" class="form-control"
                                                           data-role="tagsinput">
                                                    @error('product_color_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>


                                            </div>

                                            <div class="col-md-4">
                                                <h5>Product Color Ar <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_color_ar" class="form-control"
                                                           value="{{$product->product_color_ar}}" data-role="tagsinput">
                                                    @error('product_color_ar')
                                                    <span class="text-danger">{{ $message }}</span>
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
                                                        <input type="text" value="{{$product->discount_price}}"
                                                               name="discount_price" class="form-control">
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
                                                    <h5>Product selling Price <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" value="{{$product->selling_price}}"
                                                               name="selling_price" class="form-control">
                                                    </div>
                                                    @error('selling_price')
                                                    <span class="text-danger">
                                                        {{$message}}
                                                    </span>

                                                    @enderror
                                                </div>


                                            </div>


                                        </div>

                                        {{--                                        Seventh row       --}}

                                        <div class="row mt-4">

                                            <div class="col-md-12">

                                                <div class="col-md-6">
                                                    <h5>Short Description En <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="short_desc_en" id="textarea"
                                                                  class="form-control"
                                                                  required>
                                                            {!! $product->short_desc_en!!}
                                                        </textarea>
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
                                                                  required placeholder="Textarea text">

                                                            {!! $product->short_desc_ar!!}

                                                        </textarea>
                                                        @error('short_desc_ar')
                                                        <span class="text-danger">
                                                        {{$message}}
                                                    </span>

                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-6">
                                                <h5>Long Description En <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                        <textarea name="long_desc_en" id="editor1" class="form-control"
                                                                  required placeholder="Textarea text">
                                                            {!! $product->long_desc_en!!}

                                                        </textarea>
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
                                                                  required placeholder="Textarea text">
                                                            {!! $product->long_desc_ar!!}


                                                        </textarea>
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
                                                    <input type="checkbox" id="checkbox_2" name="hot_deals"
                                                           value="1" {{$product->hot_deals == 1?'checked' : ''}}>
                                                    <label for="checkbox_2">Hot Deals</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_3" name="featured"
                                                           value="1" {{$product->featured == 1?'checked' : ''}}>
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
                                                           value="1" {{$product->special_offer == 1?'checked' : ''}}>
                                                    <label for="checkbox_4">Special Offer</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_5" name="special_deals"
                                                           value="1" {{$product->special_deals == 1?'checked' : ''}}>
                                                    <label for="checkbox_5">Special Deals</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5"
                                           value="Update Product">
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

        {{--            Edit multi images      --}}

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box bt-3 border-info">
                        <div class="box-header">
                            <h4 class="box-title">Product Multi Images <strong>Update</strong></h4>
                        </div>

                        <form action=" {{ route('update.product.image') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row row-sm">
                                @if($multiImages)
                                @foreach($multiImages as $img)
                                    <div class="col-md-3">

                                        <div class="card">
                                            <img style="height: 200px; width: 300px;" class="card-img-top"
                                                 src="{{ asset($img->photo_name) }}" alt="Card image cap">
                                            <div class="card-body">
                                                <h5 class="card-title"></h5>
                                                <a class="btn btn-sm btn-danger" id="delete" title="Delete Data"
                                                   href=" {{ route('product.multiimg.delete', $img->id) }}"><i class="fa fa-trash"></i></a>
                                                <p class="card-text">
                                                <div class="form-group">
                                                    <label class="form-control-label">Change Image<span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" type="file"
                                                           name="multi_img[ {{$img->id}} ]">

                                                </div>


                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                                    @endif

                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="ml-5 mb-5 btn-rounded btn-primary" value="Update Image">
                                <br>

                            </div>

                        </form>


                    </div>
                </div>


            </div>


        </section>
        {{--            Edit multi images   END    --}}


    </div>

    {{--            Edit Thumb image     --}}

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box bt-3 border-info">
                    <div class="box-header">
                        <h4 class="box-title">Product Thumbnail Image <strong>Update</strong></h4>
                    </div>

                    <form method="post" action="{{ route('update-product-thambnail') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="hidden" name="old_img" value="{{ $product->product_thumbnail }}">
                        @csrf

                        <div class="row row-sm">
                            <div class="col-md-3">

                                <div class="card">
                                    <img style="height: 200px; width: 300px;" class="card-img-top"
                                         src="{{ asset($product->product_thumbnail) }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"></h5>
                                        <a class="btn btn-sm btn-danger" id="delete" title="Delete Data" href=""><i
                                                class="fa fa-trash"></i></a>
                                        <p class="card-text">
                                        <div class="form-group">
                                            <label class="form-control-label">Change Image<span
                                                    class="text-danger"></span></label>
                                            <input type="file" name="product_thumbnail"
                                                   class="form-control" onchange="mainThumbUrl(this)">
                                            <img src="" id="mainThumb">

                                        </div>


                                        </p>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="text-xs-right">
                            <input type="submit" class="ml-5 mb-5 btn-rounded btn-primary" value="Update Image">
                            <br>

                        </div>

                    </form>


                </div>
            </div>


        </div>


    </section>
    {{--          Edit Thumb image END    --}}
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
                                    var img = $('<img/>').EditClass('thumb').attr('src', e.target.result).width(80)
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
