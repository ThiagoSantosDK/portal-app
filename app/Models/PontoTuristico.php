<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PontoTuristico extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'contato', 'latitude_longitude', 'descricao', 'como_chegar', 'imagem', 'id_endereco', 'id_tipo_ponto_turistico'];

    public function enderecos()
    {
        return $this->belongsTo(Endereco::class);
    }

    public function tiposPontosTuristicos(){
        return $this->belongsTo(TipoPontoTuristico::class);
    }
}
