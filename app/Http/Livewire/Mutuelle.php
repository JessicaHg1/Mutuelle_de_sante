<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Mutuelle extends Component
{
    public function render()
    {
        return view('livewire.mutuelles.mutuelle')
            ->extends('master')
            ->section('content');
    }
}
