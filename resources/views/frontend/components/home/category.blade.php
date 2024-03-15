<div class="our-services section-pad-t30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle text-center">
                    <h2>Browse Top Categories </h2>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-contnet-center">
            @foreach($category8 as $row)
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
        <div class="row">
            <div class="col-lg-12">
                <div class="browse-btn2 text-center mt-50">
                    <a href="{{ route('category.page') }}" class="border-btn2">Browse All Sectors</a>
                </div>
            </div>
        </div>
    </div>
</div>