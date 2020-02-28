@extends('front-end.layout')

@section('title')
    Ruiz|Shop
@endsection

@section('content')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">Blog</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->

    <div class="container">
        <h1 style="color: red" class="text-center">The blog page development is still running. plese don't try this page</h1>
    </div>

    <!-- main-content-wrap start -->
    <div class="main-content-wrap blog-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-lg-1 order-2">
                    <!-- blog-sidebar-wrap start -->
                    <div class="blog-sidebar-wrap section-pt">
                        <div class="blog-sidebar-widget-area">

                            <!--single-widget start  -->
                            <div class="single-widget search-widget mb-30">
                                <h4 class="widget-title">Search</h4>
                                <form action="#">
                                    <div class="form-input">
                                        <input type="text" placeholder="Search... ">
                                        <button class="button-search" type="submit"><i class="icon-magnifier"></i></button>
                                    </div>
                                </form>
                            </div>
                            <!--single-widget start end -->

                            <!--single-widget start  -->
                            <div class="single-widget mb-30">
                                <h4 class="widget-title">Categories</h4>
                                <!-- category-widget start -->
                                <div class="category-widget-list">
                                    <ul>
                                        <li><a href="#">Digital Watch </a></li>
                                        <li><a href="#">Digital clock </a></li>
                                        <li><a href="#">Healthy</a></li>
                                        <li><a href="#">Nutrition</a></li>
                                        <li><a href="#">Time Zoon</a></li>
                                        <li><a href="#">Uncategorized</a></li>
                                        <li><a href="#">Water</a></li>
                                    </ul>
                                </div>
                                <!-- category-widget end -->
                            </div>
                            <!--single-widget end  -->

                            <!--single-widget start  -->
                            <div class="single-widget mb-30">
                                <h4 class="widget-title">Recent Posts</h4>

                                <div class="recent-post-widget">
                                    <div class="single-widget-post">
                                        <div class="post-thumb">
                                            <a href="#"><img src="{{asset('/public/front-end/assets')}}/images/blog/small-blog.jpg" alt=""></a>
                                        </div>
                                        <div class="post-info">
                                            <h6 class="post-title"><a href="#">Maecenas ultricies</a></h6>
                                            <div class="post-date">Apr 24.2019</div>
                                        </div>
                                    </div>
                                    <div class="single-widget-post">
                                        <div class="post-thumb">
                                            <a href="#"><img src="{{asset('/public/front-end/assets')}}/images/blog/small-blog-02.jpg" alt=""></a>
                                        </div>
                                        <div class="post-info">
                                            <h6 class="post-title"><a href="#">Post with Gallery</a></h6>
                                            <div class="post-date">Apr 24.2019</div>
                                        </div>
                                    </div>
                                    <div class="single-widget-post">
                                        <div class="post-thumb">
                                            <a href="#"><img src="{{asset('/public/front-end/assets')}}/images/blog/small-blog-03.jpg" alt=""></a>
                                        </div>
                                        <div class="post-info">
                                            <h6 class="post-title"><a href="#">Maecenas ultricies</a></h6>
                                            <div class="post-date">Apr 24.2019</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--single-widget end  -->

                            <!--single-widget start  -->
                            <div class="single-widget mb-30">
                                <h4 class="widget-title">Archives</h4>
                                <!-- category-widget start -->
                                <div class="category-widget-list">
                                    <ul>
                                        <li><a href="#">April 2018</a></li>
                                        <li><a href="#">April 2019</a></li>
                                    </ul>
                                </div>
                                <!-- category-widget end -->
                            </div>
                            <!--single-widget end  -->

                            <!--single-widget start  -->
                            <div class="single-widget mb-30">
                                <h4 class="widget-title">Product tags</h4>

                                <ul class="sidebar-tag">
                                    <li><a href="#">Watch</a></li>
                                    <li><a href="#">blouse</a></li>
                                    <li><a href="#">clothes</a></li>
                                    <li><a href="#">desktop</a></li>
                                    <li><a href="#">digital</a></li>
                                    <li><a href="#">fashion</a></li>
                                    <li><a href="#">women</a></li>
                                    <li><a href="#">men</a></li>
                                    <li><a href="#">clock</a></li>
                                    <li><a href="#">handbag</a></li>
                                </ul>
                            </div>
                            <!--single-widget end -->

                        </div>
                    </div>
                    <!-- blog-sidebar-wrap end -->
                </div>
                <div class="col-lg-9 order-lg-2 order-1">

                    <div class="blog-wrapper section-pt">
                        <div class="row">

                            <div class="col-lg-6 col-md-6">
                                <div class="singel-latest-blog">
                                    <div class="articles-image">
                                        <a href="blog-details.html">
                                            <img src="{{asset('/public/front-end/assets')}}/images/blog/blog-01.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="aritcles-content">
                                        <div class="author-name">
                                            post by: <a href="#"> Author Name</a> - 30 Oct 2019
                                        </div>
                                        <h4><a href="blog-details.html" class="articles-name">Ruiz Watch is one of the web's most visited watch sites and the world's</a></h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="singel-latest-blog">
                                    <div class="articles-image">
                                        <a href="blog-details.html">
                                            <img src="{{asset('/public/front-end/assets')}}/images/blog/blog-02.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="aritcles-content">
                                        <div class="author-name">
                                            post by: <a href="#"> Author Name</a> - 20 Oct 2019
                                        </div>
                                        <h4><a href="blog-details.html" class="articles-name">Ruiz Watch reviews and most popular watch & timepiece blog for serious </a></h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="singel-latest-blog">

                                    <div class="articles-image">
                                        <a href="blog-details.html">
                                            <img src="{{asset('/public/front-end/assets')}}/images/blog/blog-03.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="aritcles-content">
                                        <div class="author-name">
                                            post by: <a href="#"> Author Name</a> - 13 Oct 2019
                                        </div>
                                        <a href="blog-details.html" class="articles-name">Connected to the World: Introducing the G-Shock MTG-B1000-1A</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="singel-latest-blog">

                                    <div class="articles-image">
                                        <a href="blog-details.html">
                                            <img src="{{asset('/public/front-end/assets')}}/images/blog/blog-04.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="aritcles-content">
                                        <div class="author-name">
                                            post by: <a href="#"> Author Name</a> - 13 Oct 2019
                                        </div>
                                        <a href="blog-details.html" class="articles-name">Connected to the World: Introducing the G-Shock MTG-B1000-1A</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="singel-latest-blog">
                                    <div class="articles-image">
                                        <a href="blog-details.html">
                                            <img src="{{asset('/public/front-end/assets')}}/images/blog/blog-05.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="aritcles-content">
                                        <div class="author-name">
                                            post by: <a href="#"> Author Name</a> - 30 Oct 2019
                                        </div>
                                        <h4><a href="blog-details.html" class="articles-name">Ruiz Watch is one of the web's most visited watch sites and the world's</a></h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="singel-latest-blog">
                                    <div class="articles-image">
                                        <a href="blog-details.html">
                                            <img src="{{asset('/public/front-end/assets')}}/images/blog/blog-06.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="aritcles-content">
                                        <div class="author-name">
                                            post by: <a href="#"> Author Name</a> - 20 Oct 2019
                                        </div>
                                        <h4><a href="blog-details.html" class="articles-name">Ruiz Watch reviews and most popular watch & timepiece blog for serious </a></h4>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- paginatoin-area start -->
                        <div class="paginatoin-area">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <ul class="pagination-box">
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li>
                                            <a class="Next" href="#">Next</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- paginatoin-area end -->
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- main-content-wrap end -->
@endsection
