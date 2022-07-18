<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestataire extends Model
{
    use HasFactory;

    protected $table = 'prestataires';

    protected $fillable = [
        'nom',
        'tel',
        'adresse',
        'region',
    ];

    public function soins()
    {
        return $this->hasMany(Soins::class);
    }
}
