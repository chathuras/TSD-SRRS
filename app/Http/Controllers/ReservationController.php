<?php

namespace App\Http\Controllers;

use App\Category;
use App\Resources;
use App\Reservations;
use Illuminate\Http\Request;

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
        return view('reservation.reservation-row',
          [
            'reservations' => Reservations::all(['id', 'resource_id', 'name', 'address', 'email_address', 'start', 'end'])
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
        //
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
}
