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

        $prestataires = FacadesDB::table('prestataires')->count();

        $prestations = FacadesDB::table('prestations')->count();

        return view('livewire.dashboard', compact('mutuelles', 'users', 'adherents', 'benef', 'prestataires', 'prestations'))
            ->extends('master')
            ->section('content');
    }
}
