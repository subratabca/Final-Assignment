
<div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i> Admin</a></div>
<div class="sl-sideleft">
  <div class="input-group input-group-search">
    <input type="search" name="search" class="form-control" placeholder="Search">
    <span class="input-group-btn">
      <button class="btn"><i class="fa fa-search"></i></button>
    </span>
  </div>

  <label class="sidebar-label">Navigation</label>
  <div class="sl-sideleft-menu">

    <a href="{{ route('admin.dashboard') }}" class="sl-menu-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
        <span class="menu-item-label">Dashboard</span>
      </div>
    </a>


    @if (Auth::user()->can('categories.create') || Auth::user()->can('categories.update') || Auth::user()->can('categories.delete') ||
    Auth::user()->can('settings.create') || Auth::user()->can('settings.update') || Auth::user()->can('settings.delete'))
    <a href="#" class="sl-menu-link {{ Request::is('admin/category') || Request::is('admin/setting') ? 'active' : '' }}">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
        <span class="menu-item-label">Common Setting</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div>
    </a>
    <ul class="sl-menu-sub nav flex-column">
      @if (Auth::user()->can('categories.create') || Auth::user()->can('categories.update') || Auth::user()->can('categories.delete')) 
      <li class="nav-item"><a href="{{ route('categories') }}" class="nav-link">Category</a></li>
      @endif

      @if (Auth::user()->can('settings.create') || Auth::user()->can('settings.update') || Auth::user()->can('settings.delete')) 
      <li class="nav-item"><a href="{{ route('setting') }}" class="nav-link">Settings</a></li>
      @endif
    </ul>
    @endif


    @if (Auth::user()->can('companies.create') || Auth::user()->can('companies.update') || Auth::user()->can('companies.delete'))
    <a href="{{ route('company.list') }}" class="sl-menu-link {{ Request::is('admin/company/list') ? 'active' : '' }}">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-navigate-outline tx-24"></i>
        <span class="menu-item-label">Companies</span>
      </div>
    </a>
    @endif


    @if (Auth::user()->can('jobs.create') || Auth::user()->can('jobs.update') || Auth::user()->can('jobs.delete'))
    <a href="{{ route('job.list') }}" class="sl-menu-link {{ Request::is('admin/job/list') ? 'active' : '' }}">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-star-outline tx-24"></i>
        <span class="menu-item-label">Jobs</span>
      </div>
    </a>
    @endif


    @if (Auth::user()->can('users.create') || Auth::user()->can('users.update') || Auth::user()->can('users.delete') ||
    Auth::user()->can('roles.create') || Auth::user()->can('roles.update') || Auth::user()->can('roles.delete') ||
    Auth::user()->can('permissions.create') || Auth::user()->can('permissions.update') || Auth::user()->can('permissions.delete') ||
    Auth::user()->can('permissionFors.create') || Auth::user()->can('permissionFors.update') || Auth::user()->can('permissionFors.delete'))
    <a href="#" class="sl-menu-link {{ Request::is('admin/user') || Request::is('admin/role') || Request::is('admin/permission') || Request::is('admin/permission-for') ? 'active' : '' }}">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-person-outline tx-24"></i>
        <span class="menu-item-label">Employee ACL</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div>
    </a>
    <ul class="sl-menu-sub nav flex-column">
      @if (Auth::user()->can('users.create') || Auth::user()->can('users.update') || Auth::user()->can('users.delete'))
      <li class="nav-item"><a href="{{ route('user') }}" class="nav-link">Employee</a></li>
      @endif

      @if (Auth::user()->can('roles.create') || Auth::user()->can('roles.update') || Auth::user()->can('roles.delete'))
      <li class="nav-item"><a href="{{ route('role') }}" class="nav-link">Role</a></li>
      @endif

      @if (Auth::user()->can('permissions.create') || Auth::user()->can('permissions.update') || Auth::user()->can('permissions.delete'))
      <li class="nav-item"><a href="{{ route('permission') }}" class="nav-link">Permissions</a></li>
      @endif

      @if (Auth::user()->can('permissionFors.create') || Auth::user()->can('permissionFors.update') || Auth::user()->can('permissionFors.delete'))
      <li class="nav-item"><a href="{{ route('permissionfor') }}" class="nav-link">Add Permissions For</a></li>
      @endif
    </ul>
    @endif


    @if (Auth::user()->can('abouts.create') || Auth::user()->can('abouts.update') || Auth::user()->can('abouts.delete') ||
    Auth::user()->can('blogs.create') || Auth::user()->can('blogs.update') || Auth::user()->can('blogs.delete') ||
    Auth::user()->can('contacts.create'))
    <a href="#" class="sl-menu-link {{ Request::is('admin/about') || Request::is('admin/blog/list') || Request::is('admin/view/contact/info') ? 'active' : '' }}">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
        <span class="menu-item-label">Pages</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div>
    </a>
    <ul class="sl-menu-sub nav flex-column">
      @if (Auth::user()->can('abouts.create') || Auth::user()->can('abouts.update') || Auth::user()->can('abouts.delete'))
      <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About</a></li>
      @endif

      @if (Auth::user()->can('contacts.create'))
      <li class="nav-item"><a href="{{ route('view.contact.info') }}" class="nav-link">Contact Info</a></li>
      @endif

      @if (Auth::user()->can('blogs.create') || Auth::user()->can('blogs.update') || Auth::user()->can('blogs.delete'))
      <li class="nav-item"><a href="{{ route('blogs') }}" class="nav-link">Blog Post</a></li>
      @endif
    </ul>
    @endif

    <a href="{{ route('plugins')}}" class="sl-menu-link {{ Request::is('plugin') ? 'active' : '' }}">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-download-outline tx-22"></i>
        <span class="menu-item-label">Plugins</span>
      </div>
    </a>

    <a href="{{ route('admin.logout')}}" class="sl-menu-link">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-power tx-22"></i>
        <span class="menu-item-label">Logout</span>
      </div>
    </a>

  </div>
  <br>
</div>


