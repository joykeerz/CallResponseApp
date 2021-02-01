<?php

namespace App\Http\Controllers;

use App\Sp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $Sp = Sp::all();
        return view('Sp.main', ['Sp' => $Sp]);
    }

    public function addSp()
    {
        return view('Sp.create');
    }

    public function createSp(Request $request)
    {
        $validated = $request->validate([
            'tb_sp_name' => 'required',
            'tb_sp_contact' => 'required',
        ]);
        $sp = new Sp;
        $sp->sp_name = $request->tb_sp_name;
        $sp->sp_contact = $request->tb_sp_contact;
        $sp->save();
        return redirect()->route('mainSpRoute')->with('success', 'Created Successfuly');
    }

    public function editSp($id)
    {
        $sp = Sp::where('sp_id', $id)->firstOrFail();
        return view('Sp.edit', ['Sp' => $sp]);
    }

    public function updateSp(Request $request, $id)
    {
        $validated = $request->validate([
            'tb_sp_name' => 'required',
            'tb_sp_contact' => 'required',
        ]);
        DB::table('sps')
            ->where('sp_id', $id)
            ->update(array(
                'sp_name' => $request->tb_sp_name,
                'sp_contact' => $request->tb_sp_contact,
            ));
        return redirect()->route('mainSpRoute')->with('success', 'updated Successfuly');
    }

    public function deleteSp($id)
    {
        Sp::where('sp_id', $id)->delete();
        return redirect()->route('mainSpRoute')->with('success', 'deleted Successfuly');
    }
}
