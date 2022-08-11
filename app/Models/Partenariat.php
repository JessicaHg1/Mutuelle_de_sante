<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partenariat extends Model
{
    use HasFactory;

    protected $table = 'partenariat';

    protected $fillable = [
        'mutuelle_id',
        'prestataire_id',
        'date'
    ];

    public function mutuelle()
    {
        return $this->belongsTo(Mutuelle::class, 'mutuelle_id', 'id');
    }

    public function prestataire()
    {
        return $this->belongsTo(Prestataire::class, 'prestataire_id', 'id');
    }
}
