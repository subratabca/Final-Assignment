<div class="slider-area ">
    <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="{{ !empty($jobs[0]->category->banner_image) ? asset('upload/category/banner/medium/'.$jobs[0]->category->banner_image) : url('upload/no_image.jpg') }}">
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

<div class="job-listing-area pt-120 pb-120">
    <div class="container">
        <div class="row">
            <!-- Left content -->
            <div class="col-xl-3 col-lg-3 col-md-4">
                <div class="row">
                    <div class="col-12">
                        <div class="small-section-tittle2 mb-45">

                        <h4>Filter Jobs</h4>
                    </div>
                </div>
            </div>
            <!-- Job Category Listing start -->
            <div class="job-category-listing mb-50">
                <!-- single one -->
                <div class="single-listing">
                    <div class="small-section-tittle2">
                        <h4>Job Category</h4>
                    </div>
                    <!-- Select job items start -->
                    <div class="select-job-items2">
                        <select id="categoryDropdown">
                            <option value="{{ route('job.page') }}">All Category</option>
                            @foreach($categories as $row)
                            <option value="{{ route('job.by.category', ['id' => $row->id]) }}">{{ $row->name }} ({{ $row->jobs->count() }})</option>
                            @endforeach
                        </select>

                    </div>
                    <!--  Select job items End-->
                    <!-- select-Categories start -->
                    <div class="select-Categories pt-80 pb-50">
                        <div class="small-section-tittle2">
                            <h4>Job Type</h4>
                        </div>
                        <label class="container">Full Time
                            <input type="checkbox" >
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Part Time
                            <input type="checkbox" checked="checked active">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Remote
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Freelance
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <!-- select-Categories End -->
                </div>
                <!-- single two -->
                <div class="single-listing">
                    <div class="small-section-tittle2">
                        <h4>Job Location</h4>
                    </div>
                    <!-- Select job items start -->
                    <div class="select-job-items2">
                        <select name="select">
                            <option value="">Anywhere</option>
                            <option value="">Category 1</option>
                            <option value="">Category 2</option>
                            <option value="">Category 3</option>
                            <option value="">Category 4</option>
                        </select>
                    </div>
                    <!--  Select job items End-->
                    <!-- select-Categories start -->
                    <div class="select-Categories pt-80 pb-50">
                        <div class="small-section-tittle2">
                            <h4>Experience</h4>
                        </div>
                        <label class="container">1-2 Years
                            <input type="checkbox" >
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">2-3 Years
                            <input type="checkbox" checked="checked active">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">3-6 Years
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">6-more..
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <!-- select-Categories End -->
                </div>
                <!-- single three -->
                <div class="single-listing">
                    <!-- select-Categories start -->
                    <div class="select-Categories pb-50">
                        <div class="small-section-tittle2">
                            <h4>Posted Within</h4>
                        </div>
                        <label class="container">Any
                            <input type="checkbox" >
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Today
                            <input type="checkbox" checked="checked active">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Last 2 days
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Last 3 days
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Last 5 days
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Last 10 days
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <!-- select-Categories End -->
                </div>
                <div class="single-listing">
                    <!-- Range Slider Start -->
                    <aside class="left_widgets p_filter_widgets price_rangs_aside sidebar_box_shadow">
                        <div class="small-section-tittle2">
                            <h4>Filter Jobs</h4>
                        </div>
                        <div class="widgets_inner">
                            <div class="range_item">
                                <!-- <div id="slider-range"></div> -->
                                <input type="text" class="js-range-slider" value="" />
                                <div class="d-flex align-items-center">
                                    <div class="price_text">
                                        <p>Price :</p>
                                    </div>
                                    <div class="price_value d-flex justify-content-center">
                                        <input type="text" class="js-input-from" id="amount" readonly />
                                        <span>to</span>
                                        <input type="text" class="js-input-to" id="amount" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <!-- Range Slider End -->
                </div>
            </div>
            <!-- Job Category Listing End -->
        </div>
        <!-- Right content -->
        <div class="col-xl-9 col-lg-9 col-md-8">
            <!-- Featured_job_start -->
            <section class="featured-job-area">
                <div class="container">
                    <!-- Count of Job list Start -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="count-job mb-35">
                                <span>{{ $jobs->count() }} Jobs found</span>
                                <!-- Select job items start -->
                                <div class="select-job-items">
                                    <span>Sort by</span>
                                    <select name="select">
                                        <option value="">None</option>
                                        <option value="">job list</option>
                                        <option value="">job list</option>
                                        <option value="">job list</option>
                                    </select>
                                </div>
                                <!--  Select job items End-->
                            </div>
                        </div>
                    </div>
                    <!-- Count of Job list End -->

                    @foreach($jobs as $row)
                    <div class="single-job-items mb-30">
                        <div class="job-items">
                            <div class="company-img">
                                <a href="#"><img src="{{ !empty($row->company->logo) ? asset('upload/company/logo/small/'.$row->company->logo) : url('upload/no_image.jpg') }}" alt=""></a>
                            </div>
                            <div class="job-tittle job-tittle2">
                                <a href="{{ route('job.detail', ['id' => $row->id]) }}">
                                    <h4>{{ $row->title }}</h4>
                                </a>
                                <ul>
                                    <li>{{ $row->company->name }}</li>
                                    <li><i class="fas fa-map-marker-alt"></i>{{ $row->city }}, {{ $row->country }}</li>
                                    <p>TK {{ $row->salary }}</p>
                                    <p>
                                        @foreach(explode(',', $row->skills) as $skill)
                                        <span class="badge badge-primary">{{ $skill }}</span>
                                        @endforeach
                                    </p>
                                </ul>
                            </div>
                        </div>
                        <div class="items-link items-link2 f-right">
                            <a href="{{ route('apply.job', ['job_id' => $row->id ]) }}">Apply Now</a>
                            <span>{{ $row->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
            <!-- Featured_job_end -->
        </div>
    </div>
</div>
</div>
<!-- Job List Area End -->

<div class="pagination-area pb-115 text-center">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="single-wrap d-flex justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-start" style="display: flex;">
                            @foreach ($jobs->render()->elements as $element)
                                @if (is_string($element))
                                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                                @else
                                    @foreach ($element as $page => $url)
                                        <li class="page-item {{ $page == $jobs->currentPage() ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endforeach
                                @endif
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>






<script>
    document.getElementById('categoryDropdown').onchange = function() {
        var url = this.value;
        if (url) {
            window.location.href = url;
        }
        return false;
    };
</script>