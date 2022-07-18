<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Beneficiaire extends Component
{
    public function render()
    {
        return view('livewire.beneficiaires.beneficiaire')
            ->extends('master')
            ->section('content');
    }
}
