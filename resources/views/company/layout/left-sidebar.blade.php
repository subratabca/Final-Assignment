@if(Auth::user())
  @php
     $companies = \App\Models\Company::where('id', auth()->user()->id)->where('company_id',null)->first();
  @endphp
@endif

<div class="sl-logo"><a href="{{ route('company.dashboard') }}">{{ Auth::user()->name }}</a></div>
<div class="sl-sideleft">
  <div class="input-group input-group-search">
    <input type="search" name="search" class="form-control" placeholder="Search">
    <span class="input-group-btn">
      <button class="btn"><i class="fa fa-search"></i></button>
    </span>
  </div>

  <label class="sidebar-label">Navigation</label>
  <div class="sl-sideleft-menu">

    <a href="{{ route('company.dashboard') }}" class="sl-menu-link {{ Request::is('company/dashboard') ? 'active' : '' }}">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
        <span class="menu-item-label">Dashboard</span>
      </div>
    </a>

    <a href="{{ route('jobs') }}" class="sl-menu-link {{ Request::is('company/job') ? 'active' : '' }}">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
        <span class="menu-item-label">Jobs</span>
      </div>
    </a>

    @if(!empty($companies))
    <a href="{{ route('company.employee') }}" class="sl-menu-link {{ Request::is('company/employee/list') ? 'active' : '' }}">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-person-outline tx-24"></i>
        <span class="menu-item-label">Employee</span>
      </div>
    </a>
    @endif

    <a href="{{ route('candidate.job.list') }}" class="sl-menu-link {{ Request::is('candidate/job/list') ? 'active' : '' }}">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-navigate-outline tx-24"></i>
        <span class="menu-item-label">Candidate List</span>
      </div>
    </a>

    <a href="{{ route('company.plugin') }}" class="sl-menu-link {{ Request::is('company/plugin') ? 'active' : '' }}">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-navigate-outline tx-24"></i>
        <span class="menu-item-label">Plugin</span>
      </div>
    </a>

    <a href="{{ route('company.logout')}}" class="sl-menu-link">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-power tx-22"></i>
        <span class="menu-item-label">Logout</span>
      </div>
    </a>

  </div>
  <br>
</div>




 <style type="text/css">
   .sl-menu-link.active {
      background-color: #5B99D3 !important;
}

 </style>