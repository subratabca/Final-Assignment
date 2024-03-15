<div class="home-blog-area blog-h-padding" style="padding-top:0px; padding-bottom: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle text-center">
                    <h2>Our latest blog</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($blogs as $row)
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="home-blog-single mb-30">
                    <div class="blog-img-cap">
                        <div class="blog-img">
                            <a href="{{ route('blog.detail', ['id' => $row->id]) }}"><img src="{{ !empty($row->banner_image) ? asset('upload/blog/banner/medium/'.$row->banner_image) : url('upload/no_image.jpg') }}" alt=""></a>
                            <!-- Blog date -->
                            <div class="blog-date text-center">
                                <span>24</span>
                                <p>Now</p>
                            </div>
                        </div>
                        <div class="blog-cap">
                            <p>|   {{ $row->category->name }}</p>
                            <h3  style="min-height: 120px;"><a href="{{ route('blog.detail', ['id' => $row->id]) }}">{{ $row->title }}</a></h3>
                            <a href="{{ route('blog.detail', ['id' => $row->id]) }}" class="more-btn">Read more »</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
