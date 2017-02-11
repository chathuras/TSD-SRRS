<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ReportsController extends Controller
{

    /**
     * ReportsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function reservations() {
        return view('reports.reservations');
    }
}
