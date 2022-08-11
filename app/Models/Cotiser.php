<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotiser extends Model
{
    use HasFactory;

    protected $tabble = "cotises";

    protected $fillable = [
        'nom',
        'prenom',
        'date',
        'montant',
        'adherent_id'
    ];

    public function adherent()
    {
        return $this->belongsTo(Adherent::class, 'adherent_id', 'id');
    }
}
