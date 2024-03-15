        <!-- Testimonial Start -->
        <div class="testimonial-area testimonial-padding">
            <div class="container">
                <!-- Testimonial contents -->
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-8 col-lg-8 col-md-10">
                        <div class="h1-testimonial-active dot-style">


                            <!-- Single Testimonial -->
                            @foreach($companies as $row)
                            <div class="single-testimonial text-center">
                                <!-- Testimonial Content -->
                                <div class="testimonial-caption ">
                                    <!-- founder -->
                                    <div class="testimonial-founder  ">
                                        <div class="founder-img mb-30">
                                            <img src="{{ !empty($row->logo) ? asset('upload/company/logo/medium/'.$row->logo) : url('upload/no_image.jpg') }}">
                                            <span>Margaret Lawson</span>
                                            <p>Creative Director</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- Single Testimonial -->




                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->