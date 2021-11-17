@php

    $tags_en = \App\Models\Product::groupBy('product_tags_en')->select('product_tags_en')->get();
    $tags_ar = \App\Models\Product::groupBy('product_tags_ar')->select('product_tags_ar')->get();

@endphp


{{--$myString = $someArray[0]["product_tags_en"]; // Access Array data--}}
{{--$myArray = explode(',', $myString)[0];--}}


<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title"> @if(session()->get('language') == 'arabic') كلمات مفتاحية @else Product tags  @endif
    </h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="tag-list">

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

        </div>
        <!-- /.tag-list -->
    </div>
    <!-- /.sidebar-widget-body -->
</div>
