
        <div class="slider-area ">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="{{ !empty($job->category->banner_image) ? asset('upload/category/banner/medium/'.$job->category->banner_image) : url('upload/no_image.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>{{ $job->category->name}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="job-post-company pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-between">
                    <!-- Left Content -->
                    <div class="col-xl-7 col-lg-8">
                        <!-- job single -->
                        <div class="single-job-items mb-50">
                            <div class="job-items">
                                <div class="company-img company-img-details">
                                    <a href="#"><img src="{{ !empty($job->company->logo) ? asset('upload/company/logo/small/'.$job->company->logo) : url('upload/no_image.jpg') }}" alt=""></a>
                                </div>
                                <div class="job-tittle">
                                    <a href="#">
                                        <h4>{{ $job->title }}</h4>
                                    </a>
                                    <ul>
                                        <li>{{ $job->company->name }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                          <!-- job single End -->
                       
                        <div class="job-post-details">
                            <div class="post-details1 mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Job Description</h4>
                                </div>
                                <p>{!! htmlspecialchars_decode($job->description) !!}</p>

                            </div>
                            <div class="post-details2  mb-50">
                                 <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Required Knowledge, Skills, and Abilities</h4>
                                </div>
                               <ul>
                                   <li>System Software Development</li>
                                   <li>Mobile Applicationin iOS/Android/Tizen or other platform</li>
                                   <li>Research and code , libraries, APIs and frameworks</li>
                                   <li>Strong knowledge on software development life cycle</li>
                                   <li>Strong problem solving and debugging skills</li>
                               </ul>
                            </div>
                            <div class="post-details2  mb-50">
                                 <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Education + Experience</h4>
                                </div>
                               <ul>
                                   <li>3 or more years of professional design experience</li>
                                   <li>Direct response email experience</li>
                                   <li>Ecommerce website design experience</li>
                                   <li>Familiarity with mobile and web apps preferred</li>
                                   <li>Experience using Invision a plus</li>
                               </ul>
                            </div>
                        </div>

                    </div>
                    <!-- Right Content -->
                    <div class="col-xl-4 col-lg-4">
                        <div class="post-details3  mb-50">
                            <!-- Small Section Tittle -->
                           <div class="small-section-tittle">
                               <h4>Job Overview</h4>
                           </div>
                          <ul>
                              <li>Posted date : <span>{{ date('d M Y', strtotime($job->created_at)) }}</span></li>
                              <li>Location : <span>{{ $job->city }}, {{ $job->country }}</span></li>
                              <li>Vacancy : <span>{{ $job->vacancy }}</span></li>
                              <li>Job nature : <span>{{ $job->job_nature }}</span></li>
                              <li>Salary :  <span>TK {{ $job->salary }} monthly</span></li>
                              <li>Application date : <span>{{ date('d M Y', strtotime($job->deadline)) }}</span></li>
                          </ul>
                         <div class="apply-btn2">
                            <a href="{{ route('apply.job', ['job_id' => $job->id ]) }}" class="btn">Apply Now</a>
                         </div>
                       </div>
                        <div class="post-details4  mb-50">
                            <!-- Small Section Tittle -->
                           <div class="small-section-tittle">
                               <h4>Company Information</h4>
                           </div>
                            @if(!empty($job->company_description))
                              <p>{!! htmlspecialchars_decode($job->company_description) !!}</p>
                            @endif
                            <ul>
                                <li>Name: <span>{{ $job->company->name }}</span></li>
                                <li>Phone : <span>{{ $job->company->phone }}</span></li>
                                <li>Email: <span>{{ $job->company->email }}</span></li>
                            </ul>
                       </div>
                    </div>
                </div>
            </div>
        </div>