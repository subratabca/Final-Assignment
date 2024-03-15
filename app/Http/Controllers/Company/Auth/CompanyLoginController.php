<?php

namespace App\Http\Controllers\Company\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;

class CompanyLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected $redirectTo = 'company/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:company')->except('logout');
    }

    public function showCompanyLoginForm()
    {
        return view('company.pages.auth.login-page');
    }

    public function companyLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
       $company = Company::where('email', $request->input('email'))->first();

        if ($company->status == 1) {
            $credentials = $request->only('email', 'password');
            if (Auth::guard('company')->attempt($credentials)) {
                return redirect()->intended('/company/dashboard')->with('success', 'You have successfully logged in');
            }else{
              return redirect()->route('company.login')->with('error', 'Oops! You have entered invalid credentials');
            }
        }else{
           return redirect()->back()->with('error', 'Oppes! Your account not activated yet.After activation we will send you an email.');
        }

    }

    protected function guard()
    {
        return Auth::guard('company');
    }



}