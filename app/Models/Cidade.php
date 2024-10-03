<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'estado_id'];   

    public function estados()
    {
        return $this->belongsTo(Estado::class);
    }
    public function enderecos(){
        return $this->hasMany(Endereco::class);
    }
}
