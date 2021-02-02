<?php

namespace App\Http\Controllers;

use App\CallRecieve;
use App\CallResponse;
use Illuminate\Http\Request;
use App\products;
use App\spareparts;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

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
        $data = [
            'call_today' => CallRecieve::whereDate('created_at', today())->count(),
            'ticket_closed' => CallRecieve::whereDate('created_at', today())->where('is_responded', 1)->count(),
            'responded_call' => CallResponse::whereDate('created_at', today())->count(),
        ];
        // dd($data['responded_call']);
        // $TotalCallRecieves = DB::table('call_recieves')->where()->get()->count();
        // $TotalCallResponses = DB::table('call_responses')->get()->count();
        return view('admin.index', ['data' => $data]);
    }
}
