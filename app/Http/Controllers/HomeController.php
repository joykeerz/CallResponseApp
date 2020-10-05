<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
use App\spareparts;
use DB;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $TotalCallRecieves = DB::table('call_recieves')->get()->count();
        $TotalCallResponses = DB::table('call_responses')->get()->count();
        return view('admin.index', ['TotalCallRecieves' => $TotalCallRecieves, 'TotalCallResponses' => $TotalCallResponses]);
    }
}
