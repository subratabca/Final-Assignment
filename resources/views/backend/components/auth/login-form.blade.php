<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">
  <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
    <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Admin <span class="tx-info tx-normal">Login</span></div>
    <div class="tx-center mg-b-60">Welcome Admin Login Page</div>
    @if (Session::has('message'))
    <div class="alert alert-success" role="alert">
      {{ Session::get('message') }}
    </div>
    @endif
    <form method="POST" action="{{ route('admin.login') }}">
      @csrf

      <div class="form-group">
        <input type="text" class="form-control" name="email" placeholder="Enter your email">
        @error('email')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>

      <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Enter your password">
        @error('password')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <a href="{{ route('admin.forget.password.get') }}" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
      </div>

      <button type="submit" class="btn btn-info btn-block">Sign In</button>
    </form>
  </div>
</div>