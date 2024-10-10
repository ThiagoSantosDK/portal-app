<?php

use App\Http\Controllers\AutorController;
use App\Http\Controllers\CadernoController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\NegocioController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\PontoTuristicoController;
use App\Http\Controllers\TipoNegocioController;
use App\Http\Controllers\TipoPontoTuristicoController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
    //return view('welcome');
Route::group(['prefix'=> 'admin','as'=>'admin.'], function (){
Route::resource('/cadernos', CadernoController::class);
Route::resource('/autores', AutorController::class);
Route::resource('/noticias', NoticiaController::class);
Route::resource('/estados', EstadoController::class);
Route::resource('/cidades', CidadeController::class);
Route::resource('/negocios', NegocioController::class);
Route::resource('/enderecos', EnderecoController::class);
Route::resource('/pontosTuristicos', PontoTuristicoController::class);
Route::resource('/tiposNegocios', TipoNegocioController::class);
Route::resource('/tiposPontosTuristicos', TipoPontoTuristicoController::class);

});
