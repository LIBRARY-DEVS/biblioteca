<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ourrol extends Model
{
    use HasFactory;
    protected $table ="ourroles";


    public function usuarios()
    {
        return $this->hasMany(User::class);
    }

}
