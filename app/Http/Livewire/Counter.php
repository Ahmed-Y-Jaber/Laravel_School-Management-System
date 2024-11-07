<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public function render()
    // مشابهة ل public function index() في ال controller
    {
        return view('livewire.counter');

        // livewire.counter موجودة في  resources\views\livewire
    }


    public $count = 0;

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }


}
