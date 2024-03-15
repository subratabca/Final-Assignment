@php
    $categories = DB::table('categories')->orderBy('created_at', 'desc')->get();
@endphp       

        <div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="slider-active">
                <div class="single-slider slider-height d-flex align-items-center" data-background="/frontend/assets/img/hero/h1_hero.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-9 col-md-10">
                                <div class="hero__caption">
                                    <h1>Find the most exciting startup jobs</h1>
                                </div>
                            </div>
                        </div>
                        <!-- Search Box -->
                        <div class="row">
                            <div class="col-xl-8">
                                <!-- form -->
                                <form method="post" action="{{ route('job.search') }}" class="search-box">
                                @csrf
                                    <div class="input-form">
                                        <input type="text" name="search"  placeholder="Job Tittle or keyword">
                                    </div>
                                    <div class="select-form" >
                                        <div class="select-itms">
                                            <select name="category_id" id="select1">
                                                <option value="" disabled selected>Search By Category</option>
                                                @foreach($categories as $row)
                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="search-form">
                                         <button class="btn" type="submit" style="height:100%;">Find job</button>
                                    </div>	
                                </form>	
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>