<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestation extends Model
{
    use HasFactory;

    protected $table = 'prestations';

    protected $fillable = [
        'nom',
        'description',
        'etat',
    ];

    public function soins()
    {
        return $this->hasMany(Soins::class);
    }
}
