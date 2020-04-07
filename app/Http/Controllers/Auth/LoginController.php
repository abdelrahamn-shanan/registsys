<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
  /*  public function mobilenumber()
    {
        $loginType = request()->input('mobilenumber');
        $this->mobilenumber = filter_var($loginType, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobilenumber';
        request()->merge([$this->mobilenumber => $loginType]);

        return property_exists($this, 'mobilenumber') ? $this->mobilenumber : 'email';
    }*/
    function credentials(Request $request)
        {
          if(is_numeric($request->get('mobilenumber'))){
            return ['mobilenumber'=>$request->get('mobilenumber'),'password'=>$request->get('password')];
          }
          elseif (filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)) {
            return ['email' => $request->get('email'), 'password'=>$request->get('password')];
          }
        }
}
