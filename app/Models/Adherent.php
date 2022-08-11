<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adherent extends Model
{
    use HasFactory;

    protected $table = "adherents";

    protected $fillable = [
        'code',
        'name',
        'sexe',
        'date_naiss',
        'lieu_naiss',
        'nationalite',
        'date_inscription',
        'date_depart',
        'photo',
        'type_adhesion',
        'tel',
        'profession',
        'sit_matri',
        'adresse_service',
        'adresse_domicile',
        'personne_a_prevenir',
        'mutuelle_id',
    ];

    public function beneficiaires()
    {
        return $this->hasMany(Beneficiaire::class);
    }

    public function mutuelle()
    {
        return $this->belongsTo(Mutuelle::class, 'mutuelle_id', 'id');
    }

    public function soins()
    {
        return $this->hasMany(Soins::class);
    }

    public function cotisations()
    {
        return $this->hasMany(Cotisation::class);
    }

    public function cotises()
    {
        return $this->hasMany(Cotiser::class);
    }
}
