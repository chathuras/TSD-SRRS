<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerUser(Request $request)
    {
        $tokens = explode("-", $request->userId);
        $table = "students";
        $role = 'student';

        switch ($tokens[0]) {
            case "s":
                $table = "students";
                break;
            case "as":
            case "nas":
                $table = "staff";
                $role = 'teacher';
                break;
        }

        $requester = DB::table($table)->where([
          ['reg_id', '=', $request->input('userId')],
          ['pin', '=', (int)$request->input('pinNumber')],
        ])->get();

        if (sizeof($requester) > 0) {
            $obj = $requester['0'];
            $user = new User();
            $user->name = $obj->name;
            $user->email = $obj->email_address;
            $user->password = bcrypt($request->input('password'));
            $user->status = 2;
            $user->activation_key = uniqid();
            $user->save();

            $user = User::where('email', $user->email)->first();
            $user->assignRole($role);

            return view('auth.register');
        } else {
            return "a is smaller than b";
        }
    }

    public function changePassword()
    {
        return view('auth.password');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return view('auth.home');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
          'name' => 'required|max:255',
          'email' => 'required|email|max:255|unique:users',
          'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
          'name' => $data['name'],
          'email' => $data['email'],
          'password' => bcrypt($data['password']),
        ]);
    }
}
