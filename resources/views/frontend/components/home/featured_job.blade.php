<section class="featured-job-area feature-padding" style="padding-top:90px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle text-center">
                    <h2>Recent Jobs</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-10">
                @foreach($jobs as $row)
                <div class="single-job-items mb-30">
                    <div class="job-items">
                        <div class="company-img">
                            <a href="{{ route('job.detail', ['id' => $row->id]) }}"><img src="{{ !empty($row->company->logo) ? asset('upload/company/logo/small/'.$row->company->logo) : url('upload/no_image.jpg') }}" alt=""></a>
                        </div>
                        <div class="job-tittle">
                            <a href="{{ route('job.detail', ['id' => $row->id]) }}"><h4>{{ $row->title }}</h4></a>
                            <ul>
                                <li>{{ $row->company->name }}</li>
                                <li><i class="fas fa-map-marker-alt"></i>{{ $row->city }}, {{ $row->country }}</li>
                                <li>TK {{ $row->salary }}</li>
                                <p>
                                    @foreach(explode(',', $row->skills) as $skill)
                                    <span class="badge badge-primary">{{ $skill }}</span>
                                    @endforeach
                                </p>
                            </ul>
                        </div>
                    </div>
                    <div class="items-link f-right">
                        <a href="{{ route('apply.job', ['job_id' => $row->id ]) }}">Apply Now</a>
                        <span>{{ $row->created_at->diffForHumans() }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
