<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Adherent extends Component
{
    public function render()
    {
        return view('livewire.adherents.adherent')
            ->extends('master')
            ->section('content');
    }
}
