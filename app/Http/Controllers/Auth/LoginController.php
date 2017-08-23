<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    protected $redirectTo = '/admin/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //$this->middleware('guest')->except('logout');
    }

    public function show () {
        //return $this->showLoginForm();
        return view('login', ['name' => 'dear member']);
    }

    public function confirm(Request $request){
        $this->validateLogin($request);

        //print_r($request->all()['username']);
        $passwd = DB::table('User')->where('username', $request->all()['username'])->value('password');
        $passwd = !empty($passwd) ? $passwd : DB::table('User')->where('email', $request->all()['username'])->value('password');


        if (password_verify($request->all()['password'],$passwd)) {
            return redirect($this->redirectTo);
        } else {
            return "\n 0";
        }
    }
}
