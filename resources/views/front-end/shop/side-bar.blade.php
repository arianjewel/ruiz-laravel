<div class="col-lg-3 order-lg-1 order-2">
    <!-- shop-sidebar-wrap start -->
    <div class="shop-sidebar-wrap">
        <div class="shop-box-area">

            <!--sidebar-categores-box start  -->
            <div class="sidebar-categores-box shop-sidebar mb-30">
                <h4 class="title">Product categories</h4>
                <!-- category-sub-menu start -->
                <div class="category-sub-menu">
                    <ul>
                        @foreach($categories as $category)
                            <li class="has-sub"><a href="#">{{$category->cat_name}}</a>
                                @if($category->children)
                                    <ul>
                                        @foreach($category->children as $child)
                                            <li><a href="{{route('cat-product',['id'=>$child->id])}}">{{$child->cat_name}}</a></li>
                                        @endforeach
                                        <li><a href="{{route('cat-product',['id'=>$category->id])}}">Others</a></li>
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- category-sub-menu end -->
            </div>
            <!--sidebar-categores-box end  -->

            <!-- shop-sidebar start -->
            
{{--            <div class="shop-sidebar mb-30">--}}
{{--                <h4 class="title">Filter by Color</h4>--}}

{{--                <ul class="category-widget-list">--}}
{{--                    <li><a href="#">Red (1)</a></li>--}}
{{--                    <li><a href="#">White (1)</a></li>--}}
{{--                </ul>--}}

{{--            </div>--}}
            <!-- shop-sidebar end -->

            <!-- shop-sidebar start -->
{{--            <div class="shop-sidebar mb-30">--}}
{{--                <h4 class="title">Product tags</h4>--}}

{{--                <ul class="sidebar-tag">--}}
{{--                    <li><a href="#">accesories</a></li>--}}
{{--                    <li><a href="#">blouse</a></li>--}}
{{--                    <li><a href="#">clothes</a></li>--}}
{{--                    <li><a href="#">desktop</a></li>--}}
{{--                    <li><a href="#">digital</a></li>--}}
{{--                    <li><a href="#">fashion</a></li>--}}
{{--                    <li><a href="#">women</a></li>--}}
{{--                    <li><a href="#">men</a></li>--}}
{{--                    <li><a href="#">laptop</a></li>--}}
{{--                    <li><a href="#">handbag</a></li>--}}
{{--                </ul>--}}

{{--            </div>--}}
            <!-- shop-sidebar end -->

        </div>
    </div>
    <!-- shop-sidebar-wrap end -->
</div>
