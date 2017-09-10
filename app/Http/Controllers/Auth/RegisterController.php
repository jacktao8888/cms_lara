<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Symfony\Component\Translation\Tests\Writer\BackupDumper;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ])->validate();
    }


    protected function index() {
        return view('register')->with('name', 'dear visitor');
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    protected function store(Request $request) {
        //print_r($request->path());
        //print_r($_POST);
        //print_r($request);
        $this->validate($request, [
            'username' => 'bail|required|unique:User|max:20|alpha_dash',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
            'mail' => 'nullable|email',
        ]);

        //$this->validator($request->all());

//        $oldUser = DB::select('select * from User where username = :name', ['name' => $_REQUEST['username']]);
//        if (!empty($oldUser)) return redirect()->route('register');

        DB::transaction(function () {
            DB::insert('insert into User (username, password) values (?,?)', [$_REQUEST['username'], password_hash($_REQUEST['password_confirmation'], PASSWORD_DEFAULT)]);

//            DB::update('update User set password = ? where username = "Jerry"', ['Tom123']);
//            DB::update('update User set password = ? where username = "Jerry"', ['Jerry567']);
//            DB::update('update User set password = ? where username = "Jerry"', ['Jerry']);

            $users = DB::table('User')->pluck('username', 'id');
            foreach ($users as $id => $username) {
                echo $username."\t".$id."\n";
            }
        }, 1);
        return '注册成功';
    }

    public function register(Request $request) {
        $requestData = $request->all();
        //print_r($requestData);
        $update = array(
            'name' => $requestData['name'],
            'password' => $requestData['password_confirmation'],
            'email' => $requestData['email'],
            'remember_token' => $requestData['_token'],
            'created_at' => date('Y-m-d H:i:s'),
        );

        DB::table('users')->insert($update);

        return header($this->redirectTo);
    }
}
