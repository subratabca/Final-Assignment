        <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="{{ !empty($about->banner_image) ? asset('upload/about/banner/medium/'.$about->banner_image) : url('upload/no_image.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>About us</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="support-company-area fix section-padding2">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="right-caption">
                            <!-- Section Tittle -->
                            <div class="section-tittle section-tittle2">
                                <span class="text-dark"><h6>{!! htmlspecialchars_decode($about->title) !!}</h6></span>
                            </div>
                            <div class="support-caption">
                                <h2>History</h2>
                                <p class="pera-top">{!! htmlspecialchars_decode($about->history) !!}</p>
                            </div>
                            <div class="support-caption">
                                <h2>Vision</h2>
                                <p class="pera-top">{!! htmlspecialchars_decode($about->vision) !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="support-location-img">
                            <img src="{{ !empty($about->image) ? asset('upload/about/image/medium/'.$about->image) : url('upload/no_image.jpg') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>