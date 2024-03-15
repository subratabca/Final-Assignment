@php
$categories = \App\Models\Category::with('jobs')->orderBy('created_at', 'desc')->get();
$setting = DB::table('common_settings')->first();
@endphp

<header>
    <div class="header-area header-transparrent">
        <div class="headder-top header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-2">
                        <div class="logo">
                            <a href="{{ route('welcome') }}"><img src="{{ !empty($setting->logo) ? asset('upload/common-setting/logo/small/'.$setting->logo) : url('upload/no_image.jpg') }}" alt=""></a>
                        </div>  
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="menu-wrapper">
                            <!-- Main-menu -->
                            <div class="main-menu">
                                <nav class="d-none d-lg-block">
                                    <ul id="navigation">
                                        <li class="{{ request()->routeIs('welcome') ? 'active' : '' }}"><a href="{{ route('welcome') }}">Home</a></li>
                                        <li class="{{ request()->routeIs('about.page') ? 'active' : '' }}"><a href="{{ route('about.page') }}">About</a></li>
                                        <li class="{{ request()->routeIs('job.page') || request()->routeIs('job.by.category') ? 'active' : '' }}">
                                            <a href="#">Job</a>
                                            <ul class="submenu">
                                                <li><a href="{{ route('job.page') }}">All Jobs</a></li>
                                                @foreach($categories as $row)
                                                <li>
                                                    <a href="{{ route('job.by.category', ['id' => $row->id]) }}">
                                                        {{ $row->name }} ({{ $row->jobs->count() }})
                                                    </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="{{ request()->routeIs('blog.page') ? 'active' : '' }}"><a href="{{ route('blog.page') }}">Blog</a></li>
                                        <li class="{{ request()->routeIs('contact.page') ? 'active' : '' }}"><a href="{{ route('contact.page') }}">Contact</a></li>
                                        <li class="{{ request()->routeIs('create.resume') ? 'active' : '' }}"><a href="{{ route('create.resume') }}">Upload CV</a></li>
                                        @auth
                                        <li class="text-success {{ request()->routeIs('dashboard') || request()->routeIs('logout') ? 'active' : '' }}">
                                            <a href="#">{{ Auth::user()->name }}</a>
                                            <ul class="submenu">
                                                <li><a href="{{ route('dashboard') }}">My Dashboard</a></li>
                                                <li><a href="{{ route('logout') }}">Logout</a></li>
                                            </ul>
                                        </li>
                                        @endauth
                                        @guest
                                        <li class="text-success">
                                            <a href="#" class="{{ request()->routeIs('login') || request()->routeIs('company.login') ? 'active' : '' }}">Sign in or Create Account</a>
                                            <ul class="submenu">
                                                <li class="{{ request()->routeIs('login') ? 'active' : '' }}"><a href="{{ route('login') }}">Job Pulse</a></li>
                                                <li class="{{ request()->routeIs('company.login') ? 'active' : '' }}"><a href="{{ route('company.login') }}">Employers</a></li>
                                            </ul>
                                        </li>
                                        @endguest
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<style type="text/css">
    #navigation li.active a {
        color: #DA2461;
    }
}
</style>