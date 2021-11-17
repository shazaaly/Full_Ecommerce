<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">

        @php

$categories = App\Models\Category::orderBy('category_name_en', 'ASC')->get();

        @endphp
        <ul class="nav">

            @foreach($categories as $category)
                <li class="dropdown menu-item"><a href="#" class="dropdown-toggle"
                                                  data-toggle="dropdown"><i
                            class="icon fa fa-arrow-circle-up {{ $category->category_icon }}"
                            aria-hidden="true"></i>
                        @if(session()->get('language') == 'arabic') {{ $category-> category_name_ar }}
                        @else {{ $category-> category_name_en }} @endif
                    </a>
                    @php
                        $subcategories = \App\Models\Subcategory::where('category_id', $category->id)->orderBy('subcategory_name_en', 'ASC')->get();
                    @endphp
                    <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                            <div class="row">

                                @foreach($subcategories as $sub)


                                    <div class="col-sm-12 col-md-3">
                                        <h2 class="title">

                                            <a href=" {{ url('subcategory/product/'.$sub->id.'/'. $sub->subcategory_slug_en) }}">
                                                @if(session()->get('language') == 'arabic') {{ $sub-> subcategory_name_ar}} @else {{ $sub-> subcategory_name_en }} @endif
                                            </a>
                                        </h2>
                                        @php

                                            $subSubs = \App\Models\SubSubCategory::where('subcategory_id', $sub->id)->orderBy('subsubcategory_name_en', 'ASC')->get();

                                        @endphp
                                        <ul class="links list-unstyled">


                                            <li>
                                            @foreach($subSubs as $subSub)
                                                <li>
                                                    <a href="{{ url('sub-subcategory/product/'.$subSub->id.'/'. $subSub->subsubcategory_slug_en) }}">@if(session()->get('language') == 'arabic') {{ $subSub-> subsubcategory_name_ar}}  @else{{ $subSub-> subsubcategory_name_en}} @endif  </a>
                                                </li>
                                            @endforeach


                                        </ul>
                                    </div>
                            @endforeach

                            <!-- /.col -->

                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- /.yamm-content -->
                    </ul>
                    <!-- /.dropdown-menu --> </li>
        @endforeach
        <!-- /.menu-item -->


            <!-- /.menu-item -->

        </ul>
        <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
</div>
