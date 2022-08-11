<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    use HasFactory;

    protected $table = 'pays';

    protected $fillable = [
        'nom',
        'sous_region'
    ];

    public function mutuelles()
    {
        return $this->hasMany(Mutuelle::class);
    }
}
