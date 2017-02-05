<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Faker\Factory;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Support\Facades\DB;

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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
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
     * @param  array  $data
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
		
		public function register()
		{
				return view('auth.register');
		}
		
		public function registerUser(Request $request)
		{
				//return view('auth.register');
				//return 'testddasdadas';
		 		$faker = Factory::create();
				$tokens = explode("-",$request->userId);
				$table = "students";
				$role = 'student';
				switch ($tokens[0]) 
				{
						case "s":
								$table = "students";
								break;
						case "as":
						case "nas":
								$table = "staff";
								$role = 'teacher';
								break;
				}
				$q = 'select * from ' . $table ." where reg_id = '?' and pin= ?;";
				//$requester = DB::select($q, [$request->input('userId'), (int)$request->input('pinNumber')]);
				//return $q . '  ' . (int)$request->input('pinNumber') . '  ' .$request->input('userId');
				$requester = DB::table($table)->where([
						['reg_id', '=', $request->input('userId')],
						['pin', '=', (int)$request->input('pinNumber')],
				])->get();
				
				if (sizeof($requester) > 0) {
						$obj = $requester['0'];
						$user = new User();
						$user->name = $obj -> name; //$requester->name;
						$user->email = $obj -> email_address;  //$requester->email_address;
						$user->password = bcrypt($request->input('password'));
						$user->role = $role;
						$user->status = 2;
						$user->activation_key = bcrypt($faker->word);
						$user->save();
						return view('auth.register');
				} else {
						return "a is smaller than b";
				}
				/* if ($size > 0) {
						Obj = requester['0'],
						var_dump(Obj);
						die;
						echo "a is bigger than b";
				} else {
						return 'not found'
				}
	 */
				/* $user = new User();
        $user->name = 'chinthaka'; //$requester->name;
        $user->email = 'chinthaka@gmail.com'; //$requester->email_address;
        $user->password = bcrypt($request->input('password'));
        $user->role = 'student';
				$user->status = 2;
        $user->activation_key = bcrypt($faker->word);
				$user->save();

				return view('auth.register'); */
		}
		
		public function changePassword() {
				return view('auth.password');
		}
		
		public function updatePassword(Request $request) {
				$user = Auth::user();
				$user->password = bcrypt($request->input('password'));
				$user->save();
				return view('auth.home');
		}
}
