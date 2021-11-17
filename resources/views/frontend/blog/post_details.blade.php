@extends('frontend.main_master')

@section('title')

    {{$post->post_title_en}}

@endsection

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>Blog</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->



    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="blog-page">
                    <div class="col-md-9">

                        <div class="blog-post  wow fadeInUp">
                            <a href="blog-details.html"><img style="width: 780px; height: 433px;" class="img-responsive"
                                                             src="{{asset($post->post_image)}}" alt=""></a>
                            <h1>
                                <a href="blog-details.html">@if(session()->get('language') == 'arabic') {{$post->post_title_ar}} @else {{$post->post_title_en}} @endif
                                </a></h1>
                            <span class="author">Shaza Ali</span>

                            {{--                            <span class="review">6 Comments</span>--}}
                            <span
                                class="date-time">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</span>
                            <p>@if(session()->get('language') == 'arabic') {!!  $post->post_details_ar !!} @else  {!! $post->post_details_en!!} @endif</p>
                            <div class="social-media">



                                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                <div class="addthis_inline_share_toolbox"></div>



                            </div>


                            <div class="blog-post-author-details wow fadeInUp">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img src="{{ url('frontend/assets/images/testimonials/member3.png')}}" alt="Responsive image" class="img-circle img-responsive">
                                    </div>
                                    <div class="col-md-10">
                                        <h4>Ahmed Ibrahim</h4>
                                        <div class="btn-group author-social-network pull-right">
                                            <span>Follow me on</span>
                                            <button type="button" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="twitter-icon fa fa-twitter"></i>
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#"><i class="icon fa fa-facebook"></i>Facebook</a></li>
                                                <li><a href="#"><i class="icon fa fa-instagram"></i>Instagram</a></li>
                                                <li><a href="#"><i class="icon fa fa-linkedin"></i>Linkedin</a></li>

                                            </ul>
                                        </div>
                                        <span class="author-job">Enterpreuner and Buiness Developer</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                                    </div>
                                </div>
                            </div>

                        </div>



                        <div class="clearfix blog-pagination filters-container  wow fadeInUp"
                             style="padding:0px; background:none; box-shadow:none; margin-top:15px; border:none">

                            <div class="text-right">
                                <div class="pagination-container">
                                    <ul class="list-inline list-unstyled">
                                        {{--                                        <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>--}}
                                        {{--                                        <li><a href="#">1</a></li>--}}
                                        {{--                                        <li class="active"><a href="#">2</a></li>--}}
                                        {{--                                        <li><a href="#">3</a></li>--}}
                                        {{--                                        <li><a href="#">4</a></li>--}}
                                        {{--                                        <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>--}}
                                    </ul><!-- /.list-inline -->
                                </div><!-- /.pagination-container -->    </div><!-- /.text-right -->

                        </div><!-- /.filters-container -->                </div>
                    <div class="col-md-3 sidebar">


                        <div class="sidebar-module-container">
                            <div class="search-area outer-bottom-small">
                                <form>
                                    <div class="control-group">
                                        <input placeholder="Type to search" class="search-field">
                                        <a href="#" class="search-button"></a>
                                    </div>
                                </form>
                            </div>

                            <div class="home-banner outer-top-n outer-bottom-xs">
                                <img src="{{asset('frontend/assets/images/banners/LHS-banner.jpg')}}" alt="Image">
                            </div>
                            <!-- ==============================================CATEGORY============================================== -->
                            <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                                <h3 class="section-title">Blog Categories</h3>
                                <div class="sidebar-widget-body m-t-10">
                                    <div class="accordion">
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <ul class="list-group list-group-flush">

                                                    @foreach($categories as $category)
                                                        <li class="list-group-item">@if(session()->get('language') == 'arabic') {{$category->blog_category_name_ar}} @else {{$category->blog_category_name_en}} @endif</li>
                                                    @endforeach

                                                </ul>
                                            </div><!-- /.accordion-heading -->
                                        </div><!-- /.accordion-group -->


                                    </div><!-- /.accordion -->
                                </div><!-- /.sidebar-widget-body -->
                            </div><!-- /.sidebar-widget -->
                            <!-- ============================================== CATEGORY : END ============================================== -->
                            <!-- ============================================== PRODUCT TAGS ============================================== -->
                            <div class="sidebar-widget product-tag wow fadeInUp mb">
                                <h3 class="section-title">Product tags</h3>
                                <div class="sidebar-widget-body outer-top-xs">
                                    <div class="tag-list">

                                        @php
      $tags_en = \App\Models\Product::groupBy('product_tags_en')->select('product_tags_en')->get();
      $tags_ar = \App\Models\Product::groupBy('product_tags_ar')->select('product_tags_ar')->get();


                                        @endphp
                                        @if(session()->get('language') == 'english')

                                            @foreach($tags_en as $tag)

                                                <a class="item active" title="Phone"
                                                   href="{{ url('product/tag/'.$tag->product_tags_en) }}">{{ $tag->product_tags_en }}
                                                </a>
                                            @endforeach


                                        @else
                                            @foreach($tags_ar as $tag)

                                                <a class="item active" title="Phone"
                                                   href="{{ url('product/tag/'.$tag->product_tags_ar)}}">{{ $tag->product_tags_ar }}</a>
                                            @endforeach
                                        @endif
                                    </div><!-- /.tag-list -->
                                </div><!-- /.sidebar-widget-body -->
                            </div><!-- /.sidebar-widget -->
                            <!-- ============================================== PRODUCT TAGS : END ============================================== -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div>
    </div>

@endsection
