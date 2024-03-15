<?php 

namespace App\Http\Controllers\Company\Auth; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use DB; 
use Carbon\Carbon;  
use App\Models\Company; 
use App\Models\CompanyPasswordReset; 
use Mail; 
use Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Mail\CompanyPasswordResetMail;

class CompanyForgotPasswordController extends Controller
{
  public function showCompanyForgetPasswordForm(): View
  {
    return view('company.pages.auth.forget-password-page');
  }

  public function submitCompanyForgetPasswordForm(Request $request): RedirectResponse
  {
    $request->validate([
      'email' => 'required|email|exists:admins',
    ],
    [
      'email.required' => 'Email field is required.',
      'email.exists' => 'Email does not found.',
    ]);

    $token = Str::random(64);
    CompanyPasswordReset::create([
      'email' => $request->input('email'),
      'token' => $token,
    ]);

    Mail::to($request->email)->send(new CompanyPasswordResetMail($token));

    return back()->with('message', 'We have e-mailed your password reset link!');
  }

  public function showCompanyResetPasswordForm($token): View
  { 
    return view('company.pages.auth.forget-password-reset-page', ['token' => $token]);
  }

  public function submitCompanyResetPasswordForm(Request $request): RedirectResponse
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

    $updatePassword = CompanyPasswordReset::where(['email' => $request->email, 'token' => $request->token])->first();
    
    if(!$updatePassword){
      return back()->withInput()->with('error', 'Invalid token!');
    }

    Company::where('email', $request->email)->update([
      'password' => Hash::make($request->password)
    ]);

    CompanyPasswordReset::where(['email'=> $request->email])->delete();
    return redirect('/company/login')->with('message', 'Your password has been changed!');
  }



}