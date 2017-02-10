<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reservations = DB::table('reservations')
            ->leftJoin('resources', 'reservations.resource_id', '=', 'resources.id')
            ->select('resources.name', 'reservations.purpose','reservations.start', 'reservations.end')
            ->orderBy('reservations.created_at')
            ->limit(20)
            ->get();
       // var_dump($reservations);
        //die();
        $users = DB::table('users')
            ->select('name', 'email', 'created_at')
            ->where([['status', '=', 1]])->get();
// var_dump($users);
//        die();
//        var_dump($users['0']);
//        if (sizeof($users) > 0) {
//            $obj = $users['0'];
//            $user = new User();
//            $user->name = $obj -> name; //$requester->name;
//            $user->email = $obj -> email_address;  //$requester->email_address;
//            $user->password = bcrypt($request->input('password'));
//            $user->status = 2;
//            $user->activation_key = bcrypt($faker->word);
//            return view('auth.register');
//        } else {
//            return "a is smaller than b";
//        }
//
//        var_dump($reservations);
//        die();


        return view('home.home', [
            'reservations' => $reservations,
            'users' => $users
        ]);
//        return view('reservation.calendar', ['resource_id' => $resource_id]);
//        return view('home.home', []);
    }
}
