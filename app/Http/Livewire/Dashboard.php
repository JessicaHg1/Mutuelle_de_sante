<?php

namespace App\Http\Livewire;

use App\Models\Mutuelle;
use App\Models\User;
use Carbon\Carbon;
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

        $data = FacadesDB::select('SELECT COUNT(id) , region FROM mutuelles GROUP BY region');

        $userData = User::select('id', 'created_at')->get()->groupBy(function ($userData) {
            return Carbon::parse($userData->created_at)->format('M');
        });

        $mutuelleData = Mutuelle::select(FacadesDB::raw("COUNT(*) as count, region"))
            ->groupBy(FacadesDB::raw("region"))
            ->pluck('count');

        $mois = [];
        $usersNb = [];

        foreach ($userData as $month => $values) {
            $mois[] = $month;
            $usersNb[] = count($values);
        }

        return view(
            'livewire.dashboard',
            ['userData' => $userData, 'mois' => $mois, 'usersNb' => $usersNb],
            compact(
                'mutuelles',
                'users',
                'adherents',
                'benef',
                'prestataires',
                'prestations',
                'mutuelleData'
            )
        )
            ->extends('master')
            ->section('content');
    }
}
