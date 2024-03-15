<!-- Hero Area Start-->
<div class="slider-area ">
    <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="{{ !empty($blogs[1]->banner_image) ? asset('upload/category/banner/medium/'.$blogs[1]->banner_image) : url('upload/no_image.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>{{ $bannerTitle }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero Area End -->
<!--================Blog Area =================-->
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    @foreach($blogs as $row)
                    <article class="blog_item">
                        <div class="blog_item_img">
                            <img class="card-img rounded-0" src="{{ !empty($row->banner_image) ? asset('upload/blog/banner/large/'.$row->banner_image) : url('upload/no_image.jpg') }}" alt="">
                        </div>

                        <div class="blog_details">
                            <a class="d-inline-block" href="{{ route('blog.detail', ['id' => $row->id]) }}">
                                <h2>{{ $row->title }}</h2>
                            </a>
                            <p>{!! \Illuminate\Support\Str::limit((strip_tags($row->description)), 200, '...') !!}</p>
                            <ul class="blog-info-link">
                                <li><a href="#"><i class="fa fa-user"></i>{{ $row->category->name }}</a></li>
                                <li><a href="#"><i class="fas fa-calendar"></i>{{ date('d M Y', strtotime($row->created_at)) }}</a></li>
                                <li><a href="#"><i class="fa fa-comments"></i> 0 Comments</a></li>
                            </ul>
                        </div>
                    </article>
                    @endforeach

                    <nav class="blog-pagination justify-content-center d-flex">
                        <ul class="pagination">
                            @if ($blogs->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                    <i class="ti-angle-left"></i>
                                </span>
                            </li>
                            @else
                            <li class="page-item">
                                <a href="{{ $blogs->previousPageUrl() }}" class="page-link" rel="prev" aria-label="@lang('pagination.previous')">
                                    <i class="ti-angle-left"></i>
                                </a>
                            </li>
                            @endif

                            @foreach ($blogs as $page => $blog)
                            <li class="page-item {{ $blogs->currentPage() == $page ? 'active' : '' }}">
                                <a href="{{ $blogs->url($page) }}" class="page-link">{{ $page }}</a>
                            </li>
                            @endforeach

                            @if ($blogs->hasMorePages())
                            <li class="page-item">
                                <a href="{{ $blogs->nextPageUrl() }}" class="page-link" rel="next" aria-label="@lang('pagination.next')">
                                    <i class="ti-angle-right"></i>
                                </a>
                            </li>
                            @else
                            <li class="page-item disabled">
                                <span class="page-link" aria-disabled="true" aria-label="@lang('pagination.next')">
                                    <i class="ti-angle-right"></i>
                                </span>
                            </li>
                            @endif
                        </ul>
                    </nav>


                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form action="#">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder='Search Keyword'
                                    onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Search Keyword'">
                                    <div class="input-group-append">
                                        <button class="btns" type="button"><i class="ti-search"></i></button>
                                    </div>
                                </div>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                            type="submit">Search</button>
                        </form>
                    </aside>

                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Category</h4>
                        <ul class="list cat-list">
                            @foreach($categories as $row)
                            <li>
                                <a href="{{ route('blog.by.category', ['id' => $row->id]) }}" class="d-flex">
                                    <p>{{ $row->name}} </p>
                                    <p>( {{ $row->blogs->count() }} )</p>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </aside>

                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Recent Post</h3>
                        @foreach($recentBlogs as $row)
                        <div class="media post_item">
                            <img src="{{ !empty($row->banner_image) ? asset('upload/blog/banner/small/'.$row->banner_image) : url('upload/no_image.jpg') }}">
                            <div class="media-body">
                                <a href="{{ route('blog.detail', ['id' => $row->id]) }}">
                                    <h3>{{ $row->title}}</h3>
                                </a>
                                <p>{{ date('d M Y', strtotime($row->created_at)) }}</p>
                            </div>
                        </div>
                        @endforeach
                    </aside>

                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->