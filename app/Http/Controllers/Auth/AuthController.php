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
        $tableName = "students";
        $role = 'student';

        switch ($tokens[0]) {
            case "s":
                $tableName = "students";
                break;
            case "as":
            case "nas":
                $tableName = "staff";
                $role = 'teacher';
                break;
        }

        $validator = $this->validateAccount($request->all(), $tableName);

        if ($validator->fails()) {
            $this->throwValidationException(
              $request, $validator
            );
        }

        $requester = DB::table($tableName)->where([
          ['reg_id', '=', $request->input('userId')],
          ['pin', '=', (int)$request->input('pinNumber')],
        ])->get();

        if (sizeof($requester) > 0) {
            $obj = $requester['0'];

            $validator = $this->validateUser((array)$obj);

            if ($validator->fails()) {
                $this->throwValidationException(
                  $request, $validator
                );
            }

            $user = new User();
            $user->name = $obj->name;
            $user->email = $obj->email_address;
            $user->password = bcrypt($request->input('password'));
            $user->status = 2;
            $user->activation_key = uniqid();
            $user->save();

            $user = User::where('email', $user->email)->first();
            $user->assignRole($role);

            return $user->activation_key;
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @param  string $tableName
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validateAccount(array $data, $tableName)
    {

        return Validator::make($data, [
          'userId' => 'required|max:10|exists:' . $tableName . ',reg_id',
          'pinNumber' => 'required|min:3|max:3|exists:' . $tableName . ',pin',
          'password' => 'required|min:6|confirmed',
        ]);
    }

    protected function validateUser(array $data)
    {
        return Validator::make($data, [
          'email_address' => 'unique:users,email',
        ]);
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

    public function activate($key)
    {
        $user = User::where('activation_key', $key)->first();

        if (!empty($user)) {
            if (\Illuminate\Support\Facades\Auth::login($user)) {
                if (!\Illuminate\Support\Facades\Auth::guest()) {
                    return redirect('/');
                }
            }
        }
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
