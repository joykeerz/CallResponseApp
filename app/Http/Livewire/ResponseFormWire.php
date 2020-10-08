<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ResponseFormWire extends Component
{
    public $RecievedCall;

    public function mount($RecievedCall)
    {
        $this->RecievedCall = $RecievedCall;
    }

    public function render()
    {
        return view('livewire.response-form-wire');
    }
}
