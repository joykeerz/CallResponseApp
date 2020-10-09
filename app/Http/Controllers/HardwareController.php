<?php

namespace App\Http\Controllers;

use App\Hardware;
use App\hardware_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

class HardwareController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $hardwares = DB::table('hardware')
            ->join('hardware_types', 'hardware.hardware_type_id', '=', 'hardware_types.hardware_type_id')
            ->select('hardware.*', 'hardware_types.*')
            ->get();
        return view('Hardware.main', ['hardwares' => $hardwares]);
    }

    public function addHardware()
    {
        $types = hardware_type::all();
        return view('Hardware.create', ['types' => $types]);
    }
    public function addHardwareType()
    {
        return view('Hardware.create-type');
    }

    public function createHardware(Request $request)
    {
        $hardware = new Hardware;
        $hardware->hardware_type_id = $request->cb_type;
        $hardware->hardware_name = $request->tb_hardware_name;
        $hardware->save();

        return redirect()->route('mainHardwareRoute')->with('success', 'Created Successfuly');
    }

    public function createHardwareType(Request $request)
    {
        $hardware_type = new hardware_type;
        $hardware_type->hardware_type_name = $request->tb_type_name;
        $hardware_type->save();
        return redirect()->route('mainHardwareRoute')->with('success', 'Created Successfuly');
    }

    public function editHardware($id)
    {
        $types = hardware_type::all();
        $hardwares = Hardware::where('hardware_id', $id)->firstOrFail();
        $hardwareType = hardware_type::where('hardware_type_id', $hardwares->hardware_type_id)->firstOrFail();
        return view('Hardware.edit', ['hardwares' => $hardwares, 'types' => $types, 'hardwareType' => $hardwareType]);
    }

    public function editHardwareType($id)
    {
        $hardwaresTypes = hardware_type::where('hardware_type_id', $id)->firstOrFail();
        return view('Hardware.edit-type', ['hardwares' => $hardwaresTypes]);
    }

    public function updateHardware(Request $request, $id)
    {
        $Hardware = Hardware::where('hardware_id', '=', $id)->firstOrFail();
        DB::table('hardware')
            ->where('hardware_id', $id)
            ->update(array(
                'hardware_name' => $request->tb_hardware_name,
                'hardware_type_id' => $request->cb_type,
            ));
        return redirect()->route('mainHardwareRoute')->with('success', 'updated Successfuly');
    }

    public function updateHardwareType(Request $request, $id)
    {
        $hardwareType = hardware_type::where('hardware_type_id', '=', $id)->firstOrFail();
        DB::table('hardware_types')
            ->where('hardware_type_id', $id)
            ->update(array(
                'hardware_type_name' => $request->tb_hardwawre_namne
            ));
        return redirect()->route('mainHardwareRoute')->with('success', 'updated Successfuly');
    }

    public function deleteHardware($id)
    {
        $hardwares = Hardware::where('hardware_id', $id)->delete();
        return redirect()->route('mainHardwareRoute')->with('success', 'deleted Successfuly');
    }
}
