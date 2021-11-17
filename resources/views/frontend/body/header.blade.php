@php
    $setting = App\Models\SiteSetting::find(1);

@endphp
<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown" style="padding: 15px;
    font-size: 14px;">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="icon fa fa-user"></i>

                                @if(session()->get('language') == 'arabic') حسابي @else My Account @endif

                        <li><a href="{{ route('wishlist') }}"><i
                                    class="icon fa fa-heart"></i> @if(session()->get('language') == 'arabic')
                                    المفضلة @else Wishlist  @endif</a></li>
                        <li><a href="{{ route('mycart') }}"><i
                                    class="icon fa fa-shopping-cart"></i>@if(session()->get('language') == 'arabic')
                                    عربة التسوق @else My Cart @endif</a></li>
                        <li><a href="{{ route('checkout') }}"><i
                                    class="icon fa fa-check"></i>@if(session()->get('language') == 'arabic')
                                    الدفع @else Check out @endif
                            </a>
                        </li>

                        <li><a href="" type="button" class="btn btn-primary" data-toggle="modal"
                               data-target="#orderTracking"><i
                                    class="icon fa fa-train"></i>@if(session()->get('language') == 'arabic')
                                    تتبع الطلب@else Order Tracking @endif
                            </a>
                        </li>

                        @auth
                            <li><a href=" {{ route('dashboard') }}"><i
                                        class="icon fa fa-user"></i> @if(session()->get('language') == 'arabic')
                                        بروفايل @else User Profile @endif</a>
                            </li>
                        @else
                            <li><a href=" {{ route('login') }}"><i
                                        class="icon fa fa-lock"></i> @if(session()->get('language') == 'arabic') الدخول
                                    / التسجيل @else Login/Register  @endif</a></li>
                        @endauth


                    </ul>
                </div>
                <!-- /.cnt-account -->

                <div class="cnt-block">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small"><a href="#" class="dropdown-toggle" data-hover="dropdown"
                                                               data-toggle="dropdown"><span class="value"> @if(session()->get('language') == 'arabic')
                                        العملة  @else Currency  @endif </span><b
                                    class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">USD</a></li>
                                <li><a href="#">L.E.</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-small"><a href="#" class="dropdown-toggle" data-hover="dropdown"
                                                               data-toggle="dropdown"><span


                                    class="value">
                                    @if(session()->get('language') == 'arabic') اللغـة @else Language @endif
</span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                @if(session()->get('language') == 'arabic')
                                    <li><a href="{{ route('english.language') }}">English</a></li>

                                @else

                                    <li><a href="{{ route('arabic.language') }}">العربية</a></li>

                                @endif

                            </ul>
                        </li>
                    </ul>
                    <!-- /.list-unstyled -->
                </div>
                <!-- /.cnt-cart -->
                <div class="clearfix"></div>
            </div>
            <!-- /.header-top-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                    <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo"><a href="{{ url('/') }}"> <img style="height: 100px;
    width: 100px;" src="{{asset($setting->logo)}}"
                                                                     alt="logo"> </a></div>
                    <!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= -->
                </div>
                <!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area">
                        <form action="{{ route('product_search') }}" method="post">
                            @csrf
                            <div class="control-group">
                                <ul class="categories-filter animate-dropdown">
                                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"
                                                            href="category.html">Categories <b class="caret"></b></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li class="menu-header">Computer</li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                       href="category.html">- Clothing</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                       href="category.html">- Electronics</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                       href="category.html">- Shoes</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                       href="category.html">- Watches</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <input name="search" id="search" class="search-field"
                                       onfocus="search_result_show()" onblur="search_result_hide()"

                                       placeholder="Search here..."/>
                                <button type="submit" class="search-button"></button>
                            </div>
                        </form>
                        <div id="searchProducts">


                        </div>

                    </div>
                    <!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                </div>
                <!-- /.top-search-holder -->

                <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

                    <div class="dropdown dropdown-cart"><a href="#" class="dropdown-toggle lnk-cart"
                                                           data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket"><i class="glyphicon glyphicon-shopping-cart"></i></div>
                                <div class="basket-item-count"><span id="cartQty" class="count"></span></div>
                                <div class="total-price-basket"><span class="lbl">cart -</span> <span
                                        class="total-price"> <span class="sign">$</span>
                                        <span id="cartSubTotal" class="value"> </span> </span></div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>

                                {{--                                Here was cart item part--}}

                                <div id="miniCart">

                                </div>


                                <!-- /.cart-item -->
                                <div class="clearfix"></div>
                                <hr>
                                <div class="clearfix cart-total">
                                    <div class="pull-right"><span class="text">Sub Total :</span><span id="cartSubTotal"
                                                                                                       class='price'>  </span>
                                    </div>
                                    <div class="clearfix"></div>
                                    <a href="{{'checkout'}}"
                                       class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a></div>
                                <!-- /.cart-total-->

                            </li>
                        </ul>
                        <!-- /.dropdown-menu-->
                    </div>
                    <!-- /.dropdown-cart -->

                    <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
                </div>
                <!-- /.top-cart-row -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
    <!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse"
                            class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                            class="icon-bar"></span> <span class="icon-bar"></span></button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li class="active dropdown yamm-fw"><a href="{{ url('/') }}" data-hover="dropdown"
                                                                       class="dropdown-toggle" data-toggle="dropdown">

                                        @if(session()->get('language') == 'arabic') الرئيسية @else Home @endif</a>
                                </li>

                                {{--                                Fetch data to display in Home Page              --}}

                                @php
                                    use App\Models\Category;
                                    use App\Models\Subcategory;

    $categories = Category::orderBy('category_name_en', 'ASC')->get();

                                @endphp

                                @foreach($categories as $category)

                                    <li class="dropdown yamm mega-menu">
                                        <a href="{{ url('/') }}" data-hover="dropdown"
                                           class="dropdown-toggle"
                                           data-toggle="dropdown"> @if(session()->get('language') == 'arabic'){{$category->category_name_ar}} @else {{$category->category_name_en}} @endif
                                        </a>
                                        @php
                                            $subcategories = \App\Models\Subcategory::where('category_id', $category->id)->orderBy('subcategory_name_en', 'ASC')->get();

                                        @endphp
                                        <ul class="dropdown-menu container">
                                            <li>
                                                <div class="yamm-content ">
                                                    <div class="row">
                                                        @foreach($subcategories as $sub)

                                                            <div class="col-xs-12 col-sm-6 col-md-2 col-menu">

                                                                <h2 class="title">

                                                                    <a href=" {{ url('subcategory/product/'.$sub->id.'/'. $sub->subcategory_slug_en) }}">
                                                                        @if(session()->get('language') == 'arabic') {{ $sub-> subcategory_name_ar}} @else {{ $sub-> subcategory_name_en }} @endif
                                                                    </a>
                                                                </h2>

                                                                @php

                                                                    $subSubs = \App\Models\SubSubCategory::where('subcategory_id', $sub->id)->orderBy('subsubcategory_name_en', 'ASC')->get();

                                                                @endphp

                                                                <ul class="links">
                                                                    @foreach($subSubs as $subSub)
                                                                        <li>
                                                                            <a href="{{ url('sub-subcategory/product/'.$subSub->id.'/'. $subSub->subsubcategory_slug_en) }}">@if(session()->get('language') == 'arabic') {{ $subSub-> subsubcategory_name_ar}}  @else{{ $subSub-> subsubcategory_name_en}} @endif  </a>
                                                                        </li>
                                                                    @endforeach

                                                                </ul>

                                                            </div>
                                                    @endforeach
                                                    <!-- /.col -->


                                                        <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image">
                                                            <img
                                                                class="img-responsive"
                                                                src="{{asset('frontend/assets/images/banners/top-menu-banner.jpg')}}"
                                                                alt="">
                                                        </div>
                                                        <!-- /.yamm-content -->
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>

                                @endforeach


{{--                                <li class="dropdown  navbar-right special-menu"><a href="#">Todays offer</a></li>--}}
                                <li><a href="{{ route('shop_page') }}">Shop</a></li>

                                <li class="dropdown  navbar-right special-menu"><a
                                        href="{{ route('home_blog') }}">Blog</a></li>
                            </ul>
                            <!-- /.navbar-nav -->
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.nav-outer -->
                    </div>
                    <!-- /.navbar-collapse -->

                </div>
                <!-- /.nav-bg-class -->
            </div>
            <!-- /.navbar-default -->
        </div>
        <!-- /.container-class -->

    </div>
    <!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->


    <!-- order tracking Modal -->
    <div class="modal fade" id="orderTracking" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Track Your Order @guest()Login first please : <a
                            class="btn btn-sm btn primary" href="{{ route('login') }}">Login</a> @endif </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('order_tracking') }}" method="post">
                        @csrf

                        <div class="modal-body">
                            <label>Invoice Code</label>
                            <input class="form-control" type="text" name="code" required
                                   placeholder="Your order invoice no.">
                        </div>
                        <button type="submit" class="btn btn-danger" style="margin-left: 17px;">Track my order!</button>


                    </form>

                </div>
                {{--                <div class="modal-footer">--}}
                {{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                {{--                    <button type="button" class="btn btn-primary">Save changes</button>--}}
                {{--                </div>--}}
            </div>
        </div>
    </div>
</header>

<style>
    .search-area {
        position: relative;
    }

    #searchProducts {

        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        background-color: white;
        z-index: 999;
        border-radius: 8px;
        margin-top: 5px;

    }
</style>

    <script>

        function search_result_show() {
            $('#searchProducts').slideDown();

        }

        function search_result_hide() {
            $('#searchProducts').slideUp();

        }

    </script>
