<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

  <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
    <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Password<span class="tx-info tx-normal">Reset</span></div>
    <div class="tx-center mg-b-60">Reset New Password</div>

    <form method="POST" action="{{ route('admin.reset.password.post') }}">
      @csrf
      <input type="hidden" name="token" value="{{ $token }}">
      <div class="form-group">
        <input type="text" class="form-control" name="email" placeholder="Enter your email">
          @error('email')
              <span style="color:red;">{{ $message }}</span>
          @enderror
      </div>

      <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Enter your password">
          @error('password')
              <span style="color:red;">{{ $message }}</span>
          @enderror
      </div>

      <div class="form-group">
        <input type="password_confirmation" class="form-control" name="password_confirmation" placeholder="Enter your confirm password">
          @error('password')
              <span style="color:red;">{{ $message }}</span>
          @enderror
      </div>

      <button type="submit" class="btn btn-info btn-block">Reset Password</button>
    </form>
  </div>
</div>