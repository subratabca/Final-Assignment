   
<div class="sl-logo"><a href="{{ route('home') }}">{{ Auth::user()->name }}</a></div>
    <div class="sl-sideleft">
      <div class="input-group input-group-search">
        <input type="search" name="search" class="form-control" placeholder="Search">
        <span class="input-group-btn">
          <button class="btn"><i class="fa fa-search"></i></button>
        </span>
      </div>

      <label class="sidebar-label">Navigation</label>
      <div class="sl-sideleft-menu">

        <a href="{{ route('dashboard') }}" class="sl-menu-link {{ Request::is('dashboard') ? 'active' : '' }}">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div>
        </a>

        <a href="{{ route('resume') }}" class="sl-menu-link {{ Request::is('resume') ? 'active' : '' }}">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Resume</span>
          </div>
        </a>

        <a href="{{ route('applied.job.list') }}" class="sl-menu-link {{ Request::is('applied/job/list') ? 'active' : '' }}">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-navigate-outline tx-24"></i>
            <span class="menu-item-label">Jobs</span>
          </div>
        </a>

        <a href="{{ route('view.profile.details') }}" class="sl-menu-link {{ Request::is('view/profile/details') ? 'active' : '' }}">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-person-outline tx-24"></i>
            <span class="menu-item-label">Profile</span>
          </div>
        </a>

        <a href="{{ route('logout')}}" class="sl-menu-link">
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