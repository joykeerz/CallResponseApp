<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CallRecieve;
use App\CallResponse;
use App\Customer;
use App\Hardware;
use App\hardware_type;
use App\ResponseDetailHardware;
use App\Software;
use App\Software_Type;
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
        return view('Responses.create', ['RecievedCall' => $RecievedCall]);
    }

    public function addResponsesDetailHardware($id, $recieve_id)
    {
        $CallResponse = CallResponse::where('response_id', $id)->firstOrFail();
        $Hardwares = Hardware::all();
        return view('Responses.detail-hardware', ['CallResponse' => $CallResponse, 'Wares' => $Hardwares, 'recieve_id' => $recieve_id]);
    }
    public function addResponsesDetailSoftware($id, $recieve_id)
    {
        $CallResponse = CallResponse::where('response_id', $id)->firstOrFail();
        $Softwares = Software::all();
        return view('Responses.detail-software', ['CallResponse' => $CallResponse, 'Wares' => $Softwares, 'recieve_id' => $recieve_id]);
    }

    public function createResponses(Request $request)
    {
        if ($request->tb_problem == '21') {
            return redirect()->route('callDetail', ['id' => $request->tb_recieve_id])->with('sorry', 'this feature is still in development');
        }
        $time = now();
        $idCallResponse = DB::table('call_responses')->insertGetId([
            'user_id' => Auth::user()->id,
            'recieve_id' => $request->tb_recieve_id,
            'action' => $request->cb_action,
            'result' => $request->cb_result,
            'description' => $request->tb_desc,
            'created_at' => $time,
            'updated_at' => $time,
        ]);

        if ($request->cb_result == 'pending') {
            if ($request->tb_problem == '22') {
                return redirect()->action('ResponseController@addResponsesDetailHardware', ['id' => $idCallResponse, 'recieve_id' => $request->tb_recieve_id])->with('next', 'please fill the detail below');
            } elseif ($request->tb_problem == '21') {
                return redirect()->action('ResponseController@addResponsesDetailSoftware', ['id' => $idCallResponse, 'recieve_id' => $request->tb_recieve_id])->with('next', 'please fill the detail below');
            } else {
                return redirect()->route('callDetail', ['id' => $request->tb_recieve_id])->with('success', 'Created Successfuly');
            }
        } else {
            return redirect()->route('callDetail', ['id' => $request->tb_recieve_id])->with('success', 'Created Successfuly');
        }
    }

    public function createResponsesDetailHardware(Request $request)
    {
        $recieve_id = $request->tb_recieve_id;
        $detailHardware = new ResponseDetailHardware;
        $detailHardware->response_id = $request->tb_response_id;
        $detailHardware->hardware_id = $request->cb_hardwares;
        $detailHardware->save();
        return redirect()->route('callDetail', ['id' => $recieve_id])->with('success', 'Created Successfuly');
    }

    public function createResponsesDetailSoftware(Request $request)
    {
        $recieve_id = $request->tb_recieve_id;
        return redirect('callDetail', ['id' => $recieve_id])->with('success', 'Created Successfuly');
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
