<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soins extends Model
{
    use HasFactory;

    protected $table = "soins";

    protected $fillable = [
        'libelle',
        'montant',
        'date',
        'prestation_id',
        'prestataire_id',
        'beneficiaire_id',
        'benef'
    ];

    public function prestataire()
    {
        return $this->belongsTo(Prestataire::class, 'prestataire_id', 'id');
    }

    public function prestation()
    {
        return $this->belongsTo(Prestation::class, 'prestation_id', 'id');
    }

    public function beneficiaire()
    {
        return $this->belongsTo(Beneficiaire::class, 'beneficiaire_id', 'id');
    }
}
