<?php

namespace App\Http\Livewire;

use App\Hardware;
use App\hardware_type;
use Livewire\Component;

class ResponseFormWire extends Component
{
    public $RecievedCall;
    public $Hardwares;
    public $HardwareTypes;
    public $is_solved = 'solved';
    public $problem;

    public function mount($RecievedCall, $Hardwares)
    {
        $this->HardwareTypes = hardware_type::all();
        $this->Hardwares = $Hardwares;
        $this->RecievedCall = $RecievedCall;
        $this->problem = $this->RecievedCall->problem;
    }

    public function loadHardwares($id)
    {
        $this->Hardwares = Hardware::where('hardware_type_id', $id)->get();
    }

    public function render()
    {
        return view('livewire.response-form-wire');
    }
}
