<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoNegocio extends Model
{
    use HasFactory;

    protected $fillable = ['tipo'];

    public function negocios()
    {
        return $this->hasMany(Negocio::class);
    }
}
