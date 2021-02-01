<?php

namespace App\Http\Livewire;

use App\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Profile extends Component
{
    public function render()
    {
        return view('livewire.profile');
    }
}
