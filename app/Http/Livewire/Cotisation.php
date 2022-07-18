<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Cotisation extends Component
{
    public function render()
    {
        return view('livewire.cotisations.cotisation')
            ->extends('master')
            ->section('content');
    }
}
