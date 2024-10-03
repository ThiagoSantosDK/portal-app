<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;
    //criação em massa
    protected $fillable = ['nome','contato'];

    //Quando altero o nome do banco no migrations
    protected $table = 'autores';

    //explorar relacionamentos com o noticias
    public function noticias(){
        return $this->hasMany(Noticia::class);
    }
}
