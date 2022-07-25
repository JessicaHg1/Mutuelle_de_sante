<?php

namespace App\Http\Livewire;

use Livewire\Component;
use PDF;
use Illuminate\Support\Facades\DB as FacadesDB;

class TestPDF extends Component
{
    public function render()
    {
        $pdo = FacadesDB::connection()->getPdo();

        $data = FacadesDB::select('select id, nom, region, adresse, tel from prestataires');

        return view('livewire.test-p-d-f', compact('data'))
            ->extends('master')
            ->section('content');
    }

    public function listeTestPdf()
    {
        $data = FacadesDB::select('select id, nom, region, adresse, tel from prestataires');

        view()->share('data', $data);

        $pdf = PDF::loadView('livewire.test-p-d-f', compact('data'));

        return $pdf->download('livewire.test-p-d-f.pdf');
    }
}
