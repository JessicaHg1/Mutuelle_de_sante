<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiaire extends Model
{
    use HasFactory;

    protected $table = 'beneficiaires';

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
        'adherent_id',
    ];

    public function adherent()
    {
        return $this->belongsTo(Adherent::class, 'adherent_id', 'id');
    }

    public function soins()
    {
        return $this->hasMany(Soins::class);
    }

    public function cotisations()
    {
        return $this->hasMany(Cotisation::class);
    }
}
