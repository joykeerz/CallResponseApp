<?php

namespace App\Http\Controllers;

use App\Bp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BpController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $Bp = Bp::all();
        return view('Bp.main', ['Bp' => $Bp]);
    }

    public function addBp()
    {
        return view('Bp.create');
    }

    public function createBp(Request $request)
    {
        $validated = $request->validate([
            'tb_bp_name' => 'required',
            'tb_bp_contact' => 'required',
        ]);
        $bp = new Bp;
        $bp->bp_name = $request->tb_bp_name;
        $bp->bp_contact = $request->tb_bp_contact;
        $bp->save();
        return redirect()->route('mainBpRoute')->with('success', 'Created Successfuly');
    }

    public function editBp($id)
    {
        $bp = Bp::where('bp_id', $id)->firstOrFail();
        return view('Bp.edit', ['Bp' => $bp]);
    }

    public function updateBp(Request $request, $id)
    {
        $validated = $request->validate([
            'tb_bp_name' => 'required',
            'tb_bp_contact' => 'required',
        ]);
        DB::table('bps')
            ->where('bp_id', $id)
            ->update(array(
                'bp_name' => $request->tb_bp_name,
                'bp_contact' => $request->tb_bp_contact,
            ));
        return redirect()->route('mainBpRoute')->with('success', 'updated Successfuly');
    }

    public function deleteBp($id)
    {
        Bp::where('bp_id', $id)->delete();
        return redirect()->route('mainBpRoute')->with('success', 'deleted Successfuly');
    }
}
