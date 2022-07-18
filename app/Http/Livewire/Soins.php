<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Soins extends Component
{
    public function render()
    {
        return view('livewire.soins.soins')
            ->extends('master')
            ->section('content');
    }
}
