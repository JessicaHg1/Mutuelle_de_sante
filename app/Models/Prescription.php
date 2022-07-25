<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $table = "presciptions";

    protected $fillable = [
        'benef',
        'prescription',
        'montant',
        'date',
        'prestation_id',
        'prestataire_id',
    ];

    public function prestataire()
    {
        return $this->belongsTo(Prestataire::class, 'prestataire_id', 'id');
    }

    public function prestation()
    {
        return $this->belongsTo(Prestation::class, 'prestation_id', 'id');
    }
}
