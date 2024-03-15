   <!-- Hero Area Start-->
   <div class="slider-area ">
      <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="{{ !empty($blog->category->banner_image) ? asset('upload/category/banner/medium/'.$blog->category->banner_image) : url('upload/no_image.jpg') }}">
          <div class="container">
              <div class="row">
                  <div class="col-xl-12">
                      <div class="hero-cap text-center">
                          <h2>{{ $blog->category->name}}</h2>
                      </div>
                  </div>
              </div>
          </div>
      </div>
   </div>
   <!-- Hero Area End -->
   <!--================Blog Area =================-->
   <section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  <div class="feature-img">
                     <img class="img-fluid" src="{{ !empty($blog->banner_image) ? asset('upload/blog/banner/large/'.$blog->banner_image) : url('upload/no_image.jpg') }}" alt="">
                  </div>
                  <div class="blog_details">
                     <h2>{{ $blog->title }}</h2>
                     <ul class="blog-info-link mt-3 mb-4">
                        <li><a href="#"><i class="fa fa-user"></i> {{ $blog->category->name }}</a></li>
                        <li><a href="#"><i class="fas fa-calendar"></i> {{ date('d M Y', strtotime($blog->created_at)) }}</a></li>
                        <li><a href="#"><i class="fa fa-comments"></i> 0 Comments</a></li>
                     </ul>
                     <p class="excert">{!! htmlspecialchars_decode($blog->description) !!}</p>
                  </div>
               </div>

            </div>
            <div class="col-lg-4">
               <div class="blog_right_sidebar">
                  <aside class="single_sidebar_widget search_widget">
                     <form action="#">
                        <div class="form-group">
                           <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder='Search Keyword'
                                 onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
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
                                 <p>{{ $row->name }} ({{ $row->blogs->count() }})</p>
                              </a>
                           </li>
                        @endforeach
                     </ul>
                  </aside>

                  <aside class="single_sidebar_widget popular_post_widget">
                     <h3 class="widget_title">Recent Post ({{ $recentBlogs->count() }})</h3>
                     @foreach($recentBlogs as $row)
                     <div class="media post_item">
                        <img src="{{ !empty($row->banner_image) ? asset('upload/blog/banner/small/'.$row->banner_image) : url('upload/no_image.jpg') }}" alt="post">
                        <div class="media-body">
                           <a href="{{ route('blog.detail', ['id' => $row->id]) }}">
                              <h3>{{ $row->title }}</h3>
                           </a>
                           <p>{{ date('d M Y', strtotime($row->created_at)) }}</p>
                        </div>
                     </div>
                     @endforeach
                  </aside>

                  @if(!empty($relatedBlogs))
                  <aside class="single_sidebar_widget popular_post_widget">
                     <h3 class="widget_title">Related Post ({{ $relatedBlogs->count() }})</h3>
                     @foreach($relatedBlogs as $row)
                     <div class="media post_item">
                        <img src="{{ !empty($row->banner_image) ? asset('upload/blog/banner/small/'.$row->banner_image) : url('upload/no_image.jpg') }}" alt="post">
                        <div class="media-body">
                           <a href="{{ route('blog.detail', ['id' => $row->id]) }}">
                              <h3>{{ $row->title }}</h3>
                           </a>
                           <p>{{ date('d M Y', strtotime($row->created_at)) }}</p>
                        </div>
                     </div>
                     @endforeach
                  </aside>
                  @endif


               </div>
            </div>
         </div>
      </div>
   </section>
   <!--================ Blog Area end =================-->