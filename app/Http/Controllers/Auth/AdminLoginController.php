<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
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
    protected $redirectTo = 'admin/';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        session(['url.intended' => url()->previous()]);
        $this->redirectTo = session()->get('url.intended');
        $this->middleware('guest')->except('logout');
    }
    
    public function showLoginForm()
    {
        if (Auth::guard('web-admin')->check()) {
            return redirect('/admin');
        } elseif (strpos(url()->previous(), "login") == false) {
            session(['url.intended' => url()->previous()]);
        }
        return view('auth.admin.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['message'=>$validator->errors()], 401);
        }

        $credentials = $request->only('email', 'password');
        if (!Auth::guard('web-admin')->attempt($credentials)) {
            return view('auth.admin.login');
        }
        return redirect('/admin');
    }
}


