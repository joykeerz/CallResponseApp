<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CallRecieve;
use App\CallResponse;
use App\Customer;
use App\Machine;
use App\ResponseChain;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RecieveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dataRecieve()
    {
        $dataCallRecieve = DB::table('call_recieves')
            ->join('customers', 'call_recieves.customer_id', '=', 'customers.customer_id')
            ->join('users', 'call_recieves.user_id', '=', 'users.id')
            ->select('call_recieves.*', 'users.*', 'customers.*')
            ->get();
        return view('Recieves.data', ['calls' => $dataCallRecieve, 'no' => 0]);
    }

    public function callDetails($id)
    {
        $RecievedCall = CallRecieve::where('recieve_id', '=', $id)->firstOrFail();
        $Customer = Customer::where('customer_id', '=', $RecievedCall->customer_id)->firstOrFail();
        $callResponses = CallResponse::where('recieve_id', '=', $RecievedCall->recieve_id)->get();
        return view('Recieves.detail', ['RecievedCall' => $RecievedCall, 'callResponses' => $callResponses, 'Customer' => $Customer]);
    }

    public function newCalls()
    {
        $data = Machine::all();
        return view('Recieves.new', ['data' => $data]);
    }

    public function initNewCalls(Request $request)
    {
        $validated = $request->validate([
            'cb_customer' => 'required',
            'tb_serial_number' => 'required',
        ]);
        $machine = Machine::where('machine_serial', 'LIKE', '%' . $request->tb_serial_number . '%')->first();
        if ($machine) {
            $id = DB::table('call_recieves')->insertGetId([
                'user_id' => Auth::user()->id,
                'customer_id' => $request->cb_customer,
                'idNumber' => $request->tb_serial_number,
                'created_at' => now(),
            ]);
            return redirect()->route('addCall', ['id' => $id]);
        } else {
            return redirect()->back()->with('alert', 'Machine Serial Not Found');
        }
    }

    public function cancelCall($id)
    {
        CallRecieve::where('recieve_id', $id)->delete();
        return redirect()->route('newCall')->with('alert', 'Call Cancelled');
    }

    public function addCalls($id)
    {
        $data = DB::table('call_recieves')
            ->join('customers', 'call_recieves.customer_id', '=', 'customers.customer_id')
            ->join('machines', 'call_recieves.idNumber', '=', 'machines.machine_serial')
            ->join('bps', 'customers.bp_id', '=', 'bps.bp_id')
            ->join('sps', 'machines.sp_id', '=', 'sps.sp_id')
            ->select('customers.*', 'machines.*', 'call_recieves.*', 'bps.*', 'sps.*')
            ->where('recieve_id', $id)
            ->first();
        // dd($data);
        return view('Recieves.create', ['id' => $id, 'data' => $data]);
    }

    public function createCalls(Request $request)
    {
        // $CallRecieve = CallRecieve::where('recieve_id', $request->tb_recieve_id);
        // $CallRecieve->location = $request->tb_location;
        // $CallRecieve->equipment = $request->tb_equipment;
        // $CallRecieve->problem = $request->cb_job;
        // $CallRecieve->description = $request->tb_desc;
        // $CallRecieve->ticket_number = $request->tb_ticket_number;
        // $CallRecieve->save();
        DB::table('call_recieves')
            ->where('recieve_id', $request->tb_recieve_id)
            ->update(array(
                'location' => $request->tb_location,
                'equipment' => $request->tb_equipment,
                'problem' => $request->cb_job,
                'description' => $request->tb_desc,
                'ticket_number' => $request->tb_ticket_number,
                'updated_at' => now(),
            ));
        return redirect()->route('recieveList')->with('success', 'Created Successfuly');
    }

    public function editCalls($id)
    {
        // $RecievedCall = CallRecieve::where('recieve_id', '=', $id)->firstOrFail();
        // $Customer = Customer::where('customer_id', '=', $RecievedCall->customer_id)->firstOrFail();
        $data = DB::table('call_recieves')
            ->join('customers', 'call_recieves.customer_id', '=', 'customers.customer_id')
            ->join('machines', 'call_recieves.idNumber', '=', 'machines.machine_serial')
            ->join('bps', 'customers.bp_id', '=', 'bps.bp_id')
            ->join('sps', 'machines.sp_id', '=', 'sps.sp_id')
            ->select('customers.*', 'machines.*', 'call_recieves.*', 'bps.*', 'sps.*')
            ->where('recieve_id', $id)
            ->first();
        if (!$data) {
            dd('data tidak ada');
        }
        return view('Recieves.edit', ['data' => $data]);
    }

    public function updateCalls(Request $request, $id)
    {
        $RecievedCall = CallRecieve::where('recieve_id', '=', $id)->firstOrFail();
        DB::table('customers')
            ->where('customer_id', $RecievedCall->customer_id)
            ->update(array(
                'nama' => $request->tb_customer_name,
                'contact_phone' => $request->tb_customer_contact,
            ));

        DB::table('call_recieves')
            ->where('recieve_id', $id)
            ->update(array(
                'location' => $request->tb_location,
                'equipment' => $request->tb_equipment,
                'idNumber' => $request->tb_id_number,
                'problem' => $request->tb_problem,
                'ticket_number' => $request->tb_ticket_number,
            ));

        return redirect()->route('recieveList')->with('success', 'Updated Successfuly');
    }

    public function deleteCalls($id)
    {
        DB::table('call_recieves')->where('recieve_id', '=', $id)->delete();
        return redirect()->route('recieveList')->with('success', 'Deleted Successfuly');
    }
}
