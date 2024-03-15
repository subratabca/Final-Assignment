
<div class="slider-area ">
    <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
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

<div class="our-services section-pad-t30" style="padding-top:50px; padding-bottom: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle text-center">
                    <h2>Browse Top Categories </h2>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-contnet-center">
            @foreach($categories as $row)
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                <div class="single-services text-center mb-30">
                    <div class="services-ion">
                        <span class="">
                            <img src="{{ !empty($row->icon) ? asset('upload/category/icon/medium/'.$row->icon) : url('upload/no_image.jpg') }}" >
                        </span>
                    </div>
                    <div class="services-cap">
                        <h5><a href="{{ route('job.by.category', ['id' => $row->id]) }}">{{$row->name}}</a></h5>
                        <span>({{ $row->jobs->count() }})</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


<div class="pagination-area pb-115 text-center">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="single-wrap d-flex justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-start" style="display: flex;">
                            @foreach ($categories->render()->elements as $element)
                                @if (is_string($element))
                                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                                @else
                                    @foreach ($element as $page => $url)
                                        <li class="page-item {{ $page == $categories->currentPage() ? 'active' : '' }}">
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