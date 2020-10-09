<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CallRecieve;
use App\CallResponse;
use App\Customer;
use App\ResponseChain;
use Illuminate\Support\Facades\DB;

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

    public function addCalls()
    {
        return view('Recieves.create');
    }

    public function createCalls(Request $request)
    {
        $idCustomer = DB::table('customers')->insertGetId(
            [
                'nama' => $request->tb_customer_name,
                'contact_phone' => $request->tb_customer_contact
            ]
        );

        $CallRecieve = new CallRecieve;
        $CallRecieve->customer_id = $idCustomer;
        $CallRecieve->user_id = $request->tb_user_id;
        $CallRecieve->location = $request->tb_location;
        $CallRecieve->equipment = $request->tb_equipment;
        $CallRecieve->idNumber = $request->tb_id_number;
        $CallRecieve->problem = $request->cb_job;
        $CallRecieve->description = $request->tb_desc;
        $CallRecieve->ticket_number = $request->tb_ticket_number;
        $CallRecieve->save();

        return redirect()->route('recieveList')->with('success', 'Created Successfuly');
    }

    public function editCalls($id)
    {
        $RecievedCall = CallRecieve::where('recieve_id', '=', $id)->firstOrFail();
        $Customer = Customer::where('customer_id', '=', $RecievedCall->customer_id)->firstOrFail();

        if (!$RecievedCall) {
            dd('data tidak ada');
        }
        return view('Recieves.edit', ['RecievedCall' => $RecievedCall, 'Customer' => $Customer]);
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
        // $RecievedCall = CallRecieve::where('recieve_id', '=', $id)->firstOrFail();
        // $Customer = Customer::where('customer_id', '=', $RecievedCall->customer_id)->firstOrFail();
        // if (!$RecievedCall) {
        //     dd('data tidak ada');
        // }

        // $Customer->update(array(
        //     'nama' => $request->tb_customer_name,
        //     'contact_phone' => $request->tb_customer_contact,
        // ));


        // $RecievedCall->update(array(
        //     'location' => $request->tb_location,
        //     'equipment' => $request->tb_equipment,
        //     'idNumber' => $request->tb_id_number,
        //     'problem' => $request->tb_problem,
        //     'ticket_number' => $request->tb_ticket_number,
        // ));

        // $Customer->nama = $request->tb_customer_name;
        // $Customer->contact_phone = $request->tb_customer_contact;
        // $Customer->save();

        // $RecievedCall->location = $request->tb_location;
        // $RecievedCall->equipment = $request->tb_equipment;
        // $RecievedCall->idNumber = $request->tb_id_number;
        // $RecievedCall->problem = $request->tb_problem;
        // $RecievedCall->ticket_number = $request->tb_ticket_number;
        // $RecievedCall->save();

        return redirect()->route('recieveList')->with('success', 'Updated Successfuly');
    }

    public function deleteCalls($id)
    {
        DB::table('call_recieves')->where('recieve_id', '=', $id)->delete();
        // $RecievedCall = CallRecieve::where('recieve_id', '=', $id)->firstOrFail();
        // $RecievedCall->delete();
        return redirect()->route('recieveList')->with('success', 'Deleted Successfuly');
    }
}
