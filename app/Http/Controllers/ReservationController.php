<?php

namespace App\Http\Controllers;

use App\Category;
use App\Resources;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    /**
     * ResourceController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        var_dump(Reservation::with('resource') ->get());
        return view('reservation.reservation-row',
          [
//            'reservations' => Reservations::all(['id', 'resource_id', 'purpose', 'name', 'address', 'email_address', 'start', 'end'])
            'reservations' => Reservation::with('resources') ->get()
          ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $reservation = new Reservation();
        $reservation -> resource_id = $request ->resource_id;
        $reservation -> user_id = $user ->email;
        $reservation -> purpose = $request ->purpose;
        $reservation -> name = $request ->name;
        $reservation -> address = $request ->address;
        $reservation -> nic_number = $request ->nic;
        $reservation -> conact_number = $request ->contact_number;
        $reservation -> email_address = $request ->email_address;
        $reservation -> start = date_create_from_format('U', $request ->start); //Sat Feb 11 2017 07:00:00 GMT+0000
        $reservation -> end = date_create_from_format('U', $request ->end);
//        var_dump($reservation);
//        die();
        //add valication code to ensure that there are no overlapping reservations
        return json_encode($reservation -> save());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function categories()
    {
        return view('reservation.categories',
          [
            'categories' => Category::all([
              'id',
              'name',
              'description',
              'color',
              'icon'
            ])
          ]);
    }

    public function category($id)
    {

//        return view('reservation.resources');
        return view('reservation.resources',
          ['resources' => Resources::where('category_id', $id)->get(),
					 'category_id' =>  $id]);
    }
		
    public function resources($category_id)
    {
        return view('reservation.resources-row',
          ['resources' => Resources::where('category_id', $category_id)->get()]);
    }
		
    public function reservations()
    {
        return view('reservation.reservations');
    }

    public function calendar($resource_id)
    {
        //return $resource_id;
        return view('reservation.calendar', ['resource_id' => $resource_id]);
    }

    public function reservation($reservation_id)
    {
        $reservation = Reservation::where('id', $reservation_id)->first();
        return view('reservation.edit-calendar',
            ['reservation' => $reservation, 'resource_id' => $reservation -> resource_id]);
    }

    public function resource($resource_id)
    {
        return view('reservation.resource',
            ['resources' => Resources::where('id', $resource_id)->get()]);
    }

    public function reservationSearch(Request $request) {
        $startO = date_create_from_format("Y-m-d", $request->input('start'));
        $endO = date_create_from_format("Y-m-d", $request->input('end'));
        $resource_id =  $request->input('resource_id');

        // "2016-02-11 06:00:00.000000"
        $start = $startO->format('Y-m-d H:i:s');
        $end = $endO->format('Y-m-d H:i:s');

        $reservations = DB::select("SELECT purpose, start, end FROM `reservations` WHERE resource_id =". $resource_id . " AND (`start` BETWEEN  '". $start . "' and '" .$end. "') and (`end` BETWEEN '". $start."' and '". $end ."');");
//        var_dump($reservations);
//        $reservations = DB::table('reservations')
//            ->select('purpose','start', 'end')
//            ->whereBetween('end', [$start, $end])
//            ->whereBetween('start',[$start, $end])
//            ->get();

//        dd(DB::getQueryLog());
//        var_dump(DB::getQueryLog());
//        var_dump(Input::get('start'));
        $res_array = array();
        foreach ($reservations as $reservation) {
//            var_dump($reservation->purpose);
            array_push($res_array, [
                'title' => $reservation->purpose,
                'start' => $reservation->start,
                'end' => $reservation->end,
            ]);
        }
//        var_dump($res_array);
//        die();
        return json_encode($res_array);
    }
}
