<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotisation extends Model
{
    use HasFactory;

    protected $table = 'cotisations';

    protected $fillable = [
        'date',
        'montant',
        'etat',
        'adherent_id',
        'beneficiaire_id'
    ];

    public function adherents()
    {
        return $this->belongsTo(Adherent::class, 'adherent_id', 'id');
    }

    public function beneficiaires()
    {
        return $this->belongsTo(Beneficiaire::class, 'beneficiaire_id', 'id');
    }
}
