<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class User extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.users.user')
            ->extends('master')
            ->section('content');
    }
}
