<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB as FacadesDB;

class Dashboard extends Component
{
    public function render()
    {
        $pdo = FacadesDB::connection()->getPdo();

        $mutuelles = FacadesDB::table('mutuelles')->count();

        $users = FacadesDB::table('users')->count();

        $adherents = FacadesDB::table('adherents')->count();

        $benef = FacadesDB::table('beneficiaires')->count();

        return view('livewire.dashboard', compact('mutuelles', 'users', 'adherents', 'benef'))
            ->extends('master')
            ->section('content');
    }
}
