<?php

namespace App\Http\Controllers;

use App\Category;
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
            'resources' => Resources::with('category', 'reservation')
              ->get()
          ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all('id', 'name');
        return view('resource.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = Category::where('id', (int)$request->category_id)->first();
        $resource = new Resources();
        $resource->category()->associate($category);
        $resource->name = $request->name;
        $resource->location = $request->location;
        $resource->description = $request->description;
        $resource->icon = $request->icon;

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
        $categories = Category::all('id', 'name');
        return view('resource.form',
          [
            'resource' => Resources::where('id', $id)->first(),
            'categories' => $categories
          ]);
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
        $resource->category_id = (int)$request->category_id;
        $resource->location = $request->location;
        $resource->description = $request->description;
        $resource->icon = $request->icon;
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
        $resource = Resources::where('id', $id)->first();
        return json_encode($resource->delete());
    }

    public function upload(Request $request)
    {
        $iconFileName = uniqid();
        $iconFileName .= "." . $request->iconFile->guessExtension();
        $request->iconFile->move('storage/category', $iconFileName);

        return json_encode($iconFileName);
    }
}
