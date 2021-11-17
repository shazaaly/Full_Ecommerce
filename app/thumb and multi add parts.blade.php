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
    <img id="mainThumb" style="width: 80px; height: 80px;"
         src="{{asset($product->product_thumbnail)}}">
</div>


{{--Multi--}}
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


    @error('multi_img')
    <span class="text-danger">
                                                        {{$message}}
                                                    </span>
    @enderror
    <div class="row" id="preview_img">


    </div>
</div>
{{--======================== Mini cart  Ajax Start            --}}



{{--======================== Mini cart  Ajax End              --}}

<div class="cart-item product-summary">
    <div class="row">
        <div class="col-xs-4">
            <div class="image"><a href="detail.html"><img src="{{asset('frontend/assets/images/cart.jpg')}}"
                                                          alt=""></a></div>
        </div>
        <div class="col-xs-7">
            <h3 class="name"><a href="index.php?page-detail">Simple Product</a></h3>
            <div class="price">$600.00</div>
        </div>
        <div class="col-xs-1 action"><a href="#"><i class="fa fa-trash"></i></a></div>
    </div>
</div>
