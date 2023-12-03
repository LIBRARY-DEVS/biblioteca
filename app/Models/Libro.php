<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    public function autor()
    {
        return $this->belongsTo(Autor::class, 'autor_id');
    }

    public function editorial()
    {
        return $this->belongsTo(Editorial::class, 'editorial_id');
    }

    public function idiomasLibros()
    {
        return $this->hasMany(IdiomaLibro::class, 'libro_id');
    }

    public function prestamos()
    {
        return $this->hasMany(Prestamo::class, 'libro_id');
    }
}
