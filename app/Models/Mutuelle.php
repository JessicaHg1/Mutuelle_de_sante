<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutuelle extends Model
{
    use HasFactory;

    protected $table = 'mutuelles';

    protected $fillable = [
        'nom',
        'logo',
        'date_creation',
        'region',
        'adresse',
        'tel',
        'email',
        'nb_pers_a_charge_admis',
        'montant_adhesion',
        'montant_cotisation',
        'periode_observation',
        'periodicite_cotisation',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function adherents()
    {
        return $this->hasMany(Adherent::class);
    }
}
