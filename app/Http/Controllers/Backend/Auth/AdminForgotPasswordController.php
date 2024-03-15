<?php 

namespace App\Http\Controllers\Backend\Auth; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use DB; 
use Carbon\Carbon; 
use App\Models\User; 
use App\Models\Admin; 
use App\Models\AdminPasswordReset; 
use Mail; 
use Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Mail\AdminPasswordResetMail;

class AdminForgotPasswordController extends Controller
{
  public function showAdminForgetPasswordForm(): View
  {
    return view('backend.pages.auth.forget-password-page');
  }

  public function submitAdminForgetPasswordForm(Request $request): RedirectResponse
  {
    $request->validate([
      'email' => 'required|email|exists:admins',
    ],
    [
      'email.required' => 'Email field is required.',
      'email.exists' => 'Email does not found.',
    ]);

    $token = Str::random(64);
    AdminPasswordReset::create([
      'email' => $request->input('email'),
      'token' => $token,
    ]);

    Mail::to($request->email)->send(new AdminPasswordResetMail($token));

    return back()->with('message', 'We have e-mailed your password reset link!');
  }

  public function showAdminResetPasswordForm($token): View
  { 
    return view('backend.pages.auth.forget-password-reset-page', ['token' => $token]);
  }

  public function submitAdminResetPasswordForm(Request $request): RedirectResponse
  {
    $request->validate([
      'email' => 'required|email|exists:admins',
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

    $updatePassword = AdminPasswordReset::where(['email' => $request->email, 'token' => $request->token])->first();
    
    if(!$updatePassword){
      return back()->withInput()->with('error', 'Invalid token!');
    }

    Admin::where('email', $request->email)->update([
      'password' => Hash::make($request->password)
    ]);

    AdminPasswordReset::where(['email'=> $request->email])->delete();
    return redirect('/admin/login')->with('message', 'Your password has been changed!');
  }



}