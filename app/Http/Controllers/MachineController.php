<?php

namespace App\Http\Controllers;

use App\Machine;
use App\Sp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MachineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $machines = DB::table('machines')
            ->join('sps', 'machines.sp_id', '=', 'sps.sp_id')
            ->select('machines.*', 'sps.*')
            ->get();
        return view('Machine.main', ['machines' => $machines]);
    }

    public function addMachine()
    {
        $sp = Sp::all();
        return view('Machine.create', ['sp' => $sp]);
    }

    public function createMachine(Request $request)
    {
        $validated = $request->validate([
            'tb_serial' => 'required',
            'tb_location' => 'required',
            'tb_equipment' => 'required',
            'cb_sp' => 'required | integer',
        ]);

        $machine = new Machine;
        $machine->sp_id = $request->cb_sp;
        $machine->machine_location = $request->tb_location;
        $machine->machine_serial = $request->tb_serial;
        $machine->machine_equipment = $request->tb_equipment;
        $machine->save();
        return redirect()->route('mainMachineRoute')->with('success', 'Created Successfuly');
    }

    public function editMachine(Request $request, $id)
    {
        $machines = DB::table('machines')
            ->join('sps', 'machines.sp_id', '=', 'sps.sp_id')
            ->select('machines.*', 'sps.*')
            ->where('machine_id', $id)
            ->first();
        $sp = Sp::all();
        return view('Machine.edit', ['machine' => $machines, 'sp' => $sp]);
    }

    public function updateMachine(Request $request, $id)
    {
        $validated = $request->validate([
            'tb_serial' => 'required',
            'tb_location' => 'required',
            'tb_equipment' => 'required',
            'cb_sp' => 'required | integer',
        ]);

        DB::table('machines')
            ->where('machine_id', $id)
            ->update(array(
                'sp_id' => $request->cb_sp,
                'machine_location' => $request->tb_location,
                'machine_serial' => $request->tb_serial,
                'machine_equipment' => $request->tb_equipment,
            ));
        return redirect()->route('mainMachineRoute')->with('success', 'updated Successfuly');
    }

    public function deleteMachine($id)
    {
        Machine::where('machine_id', $id)->delete();
        return redirect()->route('mainMachineRoute')->with('success', 'Deleted Successfuly');
    }
}
