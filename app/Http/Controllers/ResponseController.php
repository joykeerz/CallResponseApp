<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CallRecieve;
use App\CallResponse;
use App\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ResponseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function addResponses($id)
    {
        $RecievedCall = CallRecieve::where('recieve_id', '=', $id)->firstOrFail();
        $Customer = Customer::where('customer_id', '=', $RecievedCall->customer_id)->firstOrFail();
        return view('Responses.create', ['RecievedCall' => $RecievedCall, 'Customer' => $Customer]);
    }

    public function createResponses(Request $request)
    {
        $CallResponse = new CallResponse;
        $CallResponse->user_id = Auth::user()->id;
        $CallResponse->recieve_id = $request->tb_recieve_id;
        $CallResponse->action = $request->cb_action;
        $CallResponse->result = $request->cb_result;
        $CallResponse->description = $request->tb_desc;
        $CallResponse->save();
        return redirect()->back()->with('success', 'Created Successfuly');
    }

    public function openTicket(Request $request)
    {
        $CallResponse = new CallResponse;
        $CallResponse->user_id = Auth::user()->id;
        $CallResponse->recieve_id = $request->tb_recieve_id;
        $CallResponse->save();

        return redirect()->back()->with('success', 'Created Successfuly');
    }
    public function closeTicket($id)
    {
        DB::table('call_recieves')
            ->where('recieve_id', $id)
            ->update(array(
                'is_responded' => '1',
            ));
        return redirect()->back()->with('success', 'Ticket Closed');
    }
}
