<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 0;

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
        if ($this->count == -1) {
            $this->count = 0;
        }
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
