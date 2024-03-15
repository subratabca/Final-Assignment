
<hr>
<div class="signup-form">
  <form action="{{ route('user.reset.password.post') }}" method="post">
    @csrf
    <div class="form-header">
      <h2>Password Reset</h2>
      <p>Employee Password Reset Form!</p>
    </div>
    <div class="form-group">
      <label>Email Address</label>
      <input type="email" class="form-control" name="email" placeholder="Enter your email">
      @error('email')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="form-group">
      <label>Password</label>
      <input type="password" class="form-control" name="password" placeholder="Enter your password">
      @error('password')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="form-group">
      <label>Confirm Password</label>
      <input type="password" class="form-control" name="password_confirmation" placeholder="Enter your confirm password">
      @error('password_confirmation')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>        
    <div class="form-group">
      <button type="submit" class="btn btn-primary btn-block btn-lg">Reset Password</button>
    </div>  
  </form>

</div>




<style>
  body {
    color: #999;
    background: #FFFFFF;
    font-family: 'Roboto', sans-serif;
  }
  .form-control {
    min-height: 41px;
    box-shadow: none;
    border-color: #e1e1e1;
  }
  .form-control:focus {
    border-color: #00cb82;
  } 
  .form-control, .btn {        
    border-radius: 3px;
  }
  .form-header {
    margin: -30px -30px 20px;
    padding: 30px 30px 10px;
    text-align: center;
    background: #00cb82;
    border-bottom: 1px solid #eee;
    color: #fff;
  }
  .form-header h2 {
    font-size: 34px;
    font-weight: bold;
    margin: 0 0 10px;
    font-family: 'Pacifico', sans-serif;
  }
  .form-header p {
    margin: 20px 0 15px;
    font-size: 17px;
    line-height: normal;
    font-family: 'Courgette', sans-serif;
  }
  .signup-form {
    width: 390px;
    margin: 0 auto; 
    padding: 30px 0;  
  }
  .signup-form form {
    color: #999;
    border-radius: 3px;
    margin-bottom: 15px;
    background: #f0f0f0;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
  }
  .signup-form .form-group {
    margin-bottom: 20px;
  }   
  .signup-form label {
    font-weight: normal;
    font-size: 14px;
  }
  .signup-form input[type="checkbox"] {
    position: relative;
    top: 1px;
  }
  .signup-form .btn {        
    font-size: 16px;
    font-weight: bold;
    background: #00cb82;
    border: none;
    min-width: 200px;
  }
  .signup-form .btn:hover, .signup-form .btn:focus {
    background: #00b073 !important;
    outline: none;
  }
  .signup-form a {
    color: #00cb82;   
  }
  .signup-form a:hover {
    text-decoration: underline;
  }
</style>


