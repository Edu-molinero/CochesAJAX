<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coches extends Model
{
    protected $fillable = ['modelo', 'marca', 'categoria_id', 'imagen'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
