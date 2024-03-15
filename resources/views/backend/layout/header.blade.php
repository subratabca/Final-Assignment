@if(Auth::user())
  @php
    $userName = auth()->user()->name;
    $profileImage = auth()->user()->logo;
    $imageUrl = !empty($profileImage) ? asset('upload/company/logo/small/'.$profileImage) : url('upload/no_image.jpg');

    $unreadNotificationsCount = auth()->user()->unreadNotifications ? auth()->user()->unreadNotifications->count() : 0;
  @endphp
@endif

<div class="sl-header">
  <div class="sl-header-left">
    <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
    <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
  </div>

  <div class="sl-header-right">
    <nav class="nav">
      <div class="dropdown">
        <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
          <span class="logged-name">{{ $userName }}</span>
          <img src="{{ $imageUrl }}" class="wd-32 rounded-circle" alt="">
        </a>
        <div class="dropdown-menu dropdown-menu-header wd-200">
          <ul class="list-unstyled user-profile-nav">
            <li><a href="{{ route('view.admin.profile')}}"><i class="icon ion-ios-person-outline"></i> View Profile</a></li>
            <li><a href="{{ route('edit.admin.profile')}}"><i class="icon ion-ios-download-outline"></i> Edit Profile</a></li>
            <li><a href="{{ route('admin.change.password') }}"><i class="icon ion-ios-star-outline"></i>Change Password</a></li>
            <li><a href="{{ route('admin.logout')}}"><i class="icon ion-power"></i> Sign Out</a></li>
          </ul>
        </div>
      </div>
    </nav>
<div class="navicon-right">
  <a id="btnRightMenu" href="" class="pos-relative">
    <i class="icon ion-ios-bell-outline"></i>
    <span class="notification-count">{{ $unreadNotificationsCount }}</span>
  </a>
</div>
  </div>
</div>

<div class="sl-sideright">
  <ul class="nav nav-tabs nav-fill sidebar-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" role="tab" href="#notifications">Notifications ({{ $unreadNotificationsCount }})</a>
    </li>
  </ul>

  <div class="tab-content">
    <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="notifications" role="tabpanel">
      <div class="media-list">

        <!-- Unread Notification -->
        @foreach (Auth::user()->unreadNotifications as $notification)
        <a href="{{ route('markRead', ['id' => $notification->id]) }}" class="media-list-link read">
          <div class="media pd-x-20 pd-y-15">
            <img src="{{ $imageUrl }}" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">{{$notification-> data['data']}}</strong></p>
              <span class="tx-12">{{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</span>
            </div>
          </div>
        </a>
        @endforeach

        <!-- Read Notification -->
        @foreach (Auth::user()->readNotifications as $notification)
        <a href="" class="media-list-link read" style="background-color:#ADB2BA">
          <div class="media pd-x-20 pd-y-15">
            <img src="{{ $imageUrl }}" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">{{$notification-> data['data']}}</strong></p>
              <span class="tx-12">{{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</span>
            </div>
          </div>
        </a>
        @endforeach
      </div>
    </div>

  </div>
</div>


<style type="text/css">
  .pos-relative {
    position: relative;
  }

  .notification-count {
    position: absolute;
    top: -5px;
    right: -10px;
    background-color: red;
    color: white;
    border-radius: 50%;
    padding: 5px;
    font-size: 12px; 
  }

  .icon {
    font-size: 24px; 
    vertical-align: middle; 
  }

</style>
