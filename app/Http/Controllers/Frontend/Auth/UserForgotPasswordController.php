<?php 

namespace App\Http\Controllers\Frontend\Auth; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use DB; 
use Carbon\Carbon; 
use App\Models\User; 
use App\Models\UserPasswordReset; 
use Mail; 
use Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Mail\UserPasswordResetMail;

class UserForgotPasswordController extends Controller
{
  public function showForgetPasswordForm(): View
  {
    return view('frontend.pages.auth.forget-password-page');
  }

  public function submitForgetPasswordForm(Request $request): RedirectResponse
  {
    $request->validate([
      'email' => 'required|email|exists:users',
    ],
    [
      'email.required' => 'Email field is required.',
      'email.exists' => 'Email does not found.',
    ]);

    $token = Str::random(64);
    UserPasswordReset::create([
      'email' => $request->input('email'),
      'token' => $token,
    ]);

    Mail::to($request->email)->send(new UserPasswordResetMail($token));

    return back()->with('message', 'We have e-mailed your password reset link!');
  }

  public function showResetPasswordForm($token): View
  { 
    return view('frontend.pages.auth.forget-password-reset-page', ['token' => $token]);
  }

  public function submitResetPasswordForm(Request $request): RedirectResponse
  {
    $request->validate([
      'email' => 'required|email|exists:users',
      'password' => 'required|string|min:6|confirmed',
      'password_confirmation' => 'required'
    ],
    [
      'email.required' => 'Email field is required.',
      'email.exists' => 'Email does not found.',
      'password.required' => 'Password field is required.',
      'password.min' => 'Password should be min 6 characters',
      'password.confirmed' => 'Password does not match.',
      'password_confirmation.required' => 'Confirm Password field is required.',
    ]);

    $updatePassword = UserPasswordReset::where(['email' => $request->email, 'token' => $request->token])->first();
    
    if(!$updatePassword){
      return back()->withInput()->with('error', 'Invalid token!');
    }

    User::where('email', $request->email)->update([
      'password' => Hash::make($request->password)
    ]);

    UserPasswordReset::where(['email'=> $request->email])->delete();
    return redirect()->route('login')->with('message', 'Your password has been changed!');
  }



}