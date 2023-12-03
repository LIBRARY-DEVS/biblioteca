<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    use HasFactory;

    public function libros()
    {
        return $this->hasMany(IdiomaLibro::class, 'idioma_id');
    }
}
