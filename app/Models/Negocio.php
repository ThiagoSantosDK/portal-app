<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Negocio extends Model
{
    use HasFactory;

    protected $fillable = ['nome_fantasia', 'descricao', 'contato', 'latitude_longitude', 'ativo', 'id_tipo_negocio', 'id_endereco'];

    public function tiposNegocios()
    {
        return $this->belongsTo(TipoNegocio::class);
    }

    public function enderecos()
    {
        return $this->belongsTo(Endereco::class);
    }

}
