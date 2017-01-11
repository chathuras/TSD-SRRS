<?php

namespace App\Http\Controllers;

use App\Resources;
use Illuminate\Http\Request;

class ResourceController extends Controller
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
        return view('resource.row',
          [
            'resources' => Resources::all([
              'id',
              'id_category',
              'name',
              'location',
              'description'
            ])
          ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('resource.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $resource = new Resources();
        $resource->name = $request->name;
        $resource->id_category = (int) $request->id_category;
        $resource->location = $request->location;
        $resource->description = $request->description;

        return json_encode($resource->save());
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
        return view('resource.form',
          ['resource' => Resources::where('id', $id)->first()]);
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
        $resource = Resources::where('id', $id)->first();
        $resource->name = $request->name;
        $resource->id_category = (int) $request->id_category;
        $resource->location = $request->location;
        $resource->description = $request->description;

        return json_encode($resource->save());
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
}
