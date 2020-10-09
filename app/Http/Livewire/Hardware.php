<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\hardware_type;
use App\Hardware as hw;
use Illuminate\Support\Facades\DB;

class Hardware extends Component
{
    public $hardwares;
    // public $hardware_name = '', $hardware_id = '', $hardware_type = '';
    // public $addState = 0;
    // public $editState = 0;

    public function render()
    {
        $this->hardwares = DB::table('hardware')
            ->join('hardware_types', 'hardware.hardware_type_id', '=', 'hardware_types.hardware_type_id')
            ->select('hardware.*', 'hardware_types.*')
            ->get();
        return view('livewire.hardware', ['types' => hardware_type::all()]);
    }

    // public function editHardware($id)
    // {
    //     $editHardware = hw::where('hardware_id', '=', $id)->firstOrFail();
    //     $this->hardware_name = $editHardware->hardware_name;
    //     $this->hardware_id = $editHardware->hardware_id;
    //     $this->hardware_type = $editHardware->hardware_type_id;
    //     $this->editState = 1;
    // }

    // public function updateHardware()
    // {
    //     DB::table('hardware')
    //         ->where('hardware_id', $this->hardware_id)
    //         ->update(array(
    //             'hardware_name' => $this->hardware_name,
    //             'hardware_type_id' => $this->hardware_type,
    //         ));
    //     $this->resetVar();
    //     // return redirect()->route('mainHardwareRoute')->with('success', 'updated Successfuly');
    // }

    // public function showHardwareType()
    // {
    //     $this->addState = 1;
    // }

    // public function showHardware()
    // {
    //     $this->addState = 2;
    // }

    // public function cancel()
    // {
    //     $this->addState = 0;
    // }
    // public function resetVar()
    // {
    //     $this->hardware_id = '';
    //     $this->hardware_name = '';
    //     $this->hardware_type = '';
    //     $this->addState = 0;
    //     $this->editState = 0;
    // }
}
