<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['nom'];

    public function anuncis()
    {
        return $this->hasMany(Anunci::class);
    }
}
