@php
$companies = \App\Models\Company::latest()->where('status',1)->where('company_id',null)->get();
@endphp
<div class="testimonial-area testimonial-padding" style="padding-top:0px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle text-center">
                    <h2>Enrolled Companies({{$companies->count()}})</h2>
                </div>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col-xl-8 col-lg-8 col-md-10">
                <div class="h1-testimonial-active dot-style">
                    @foreach($companies->chunk(4) as $companyGroup)
                    <div class="single-slide">
                        <div class="row">
                            @foreach($companyGroup as $company)
                            <div class="col-md-3">
                                <div class="single-testimonial text-center">
                                    <div class="testimonial-caption">
                                        <div class="testimonial-founder">
                                            <div class="founder-img mb-30 bordered-image">
                                                <img src="{{ !empty($company->logo) ? asset('upload/company/logo/small/'.$company->logo) : url('upload/no_image.jpg') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


<style type="text/css">
    .bordered-image {
        border: 2px solid #000; 
        height: 150px; 
        overflow: hidden; 
    }

    .founder-img img {
        width: 100%; 
        height: auto; 
    }
</style>