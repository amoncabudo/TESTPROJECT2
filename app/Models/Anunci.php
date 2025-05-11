<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anunci extends Model

{   protected $fillable = [
    'titol',
    'descripcio',
    'categoria_id',
    'email',
    'time',
    'date',
];

public function categories()
{
    return $this->belongsTo(Categoria::class);
}
}
