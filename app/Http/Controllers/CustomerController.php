<?php

namespace App\Http\Controllers;

use App\Bp;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $customer = DB::table('customers')
            ->join('bps', 'customers.bp_id', '=', 'bps.bp_id')
            ->select('customers.*', 'bps.*')
            ->get();
        return view('Customer.main', ['Customers' => $customer]);
    }

    public function addCustomer()
    {
        $bp = Bp::all();
        return view('Customer.create', ['Bp' => $bp]);
    }

    public function createCustomer(Request $request)
    {
        $validated = $request->validate([
            'tb_customer_name' => 'required',
            'tb_customer_contact' => 'required',
        ]);
        $customer = new Customer;
        $customer->bp_id = $request->cb_bp;
        $customer->nama = $request->tb_customer_name;
        $customer->contact_phone = $request->tb_customer_contact;
        $customer->save();
        return redirect()->route('mainCustomerRoute')->with('success', 'Created Successfuly');
    }

    public function editCustomer($id)
    {
        $customer = DB::table('customers')
            ->join('bps', 'customers.bp_id', '=', 'bps.bp_id')
            ->select('customers.*', 'bps.*')
            ->where('customer_id', $id)
            ->first();
        $bp = Bp::all();
        return view('Customer.edit', ['customer' => $customer, 'Bp' => $bp]);
    }

    public function updateCustomer(Request $request, $id)
    {
        $validated = $request->validate([
            'tb_customer_name' => 'required',
            'tb_customer_contact' => 'required',
        ]);
        DB::table('customers')
            ->where('customer_id', $id)
            ->update(array(
                'bp_id' => $request->cb_bp,
                'nama' => $request->tb_customer_name,
                'contact_phone' => $request->tb_customer_contact,
            ));
        return redirect()->route('mainCustomerRoute')->with('success', 'Updated Successfuly');
    }

    public function deleteCustomer($id)
    {
        Customer::where('customer_id', $id)->delete();
        return redirect()->route('mainCustomerRoute')->with('success', 'Deleted Successfuly');
    }
}
