<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">
  <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
    <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Forget - <span class="tx-info tx-normal">Password</span></div>
    <div class="tx-center mg-b-60">Forget Password Page</div>
    @if (Session::has('message'))
    <div class="alert alert-success" role="alert">
      {{ Session::get('message') }}
    </div>
    @endif
    <form method="POST" action="{{ route('admin.forget.password.post') }}">
      @csrf
      <div class="form-group">
        <input type="text" class="form-control" name="email" placeholder="Enter your email">
        @error('email')
        <span style="color:red;">{{ $message }}</span>
        @enderror
      </div>
      <button type="submit" class="btn btn-info btn-block">Send Password Reset Link</button>
    </form>

  </div>
</div>